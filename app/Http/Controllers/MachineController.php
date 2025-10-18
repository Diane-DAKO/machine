<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Machine;
use App\Models\MachineImage;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class MachineController extends Controller
{


 
        public function index()
        {
            $machines = Machine::with('category', 'images')->get();
            return view('admin.machines.index', compact('machines'));
        }
    
        public function create()
        {
            $categories = Category::all();
            return view('partials.formmachine', compact('categories'));
        }
        
        public function edit(Machine $machine)
        {
            $categories = Category::all();
            return view('partials.formmachine', compact('machine', 'categories'));
        }

        
        public function catalogue(Request $request)
        {
            $categoryId = $request->input('category');
        
            $machines = Machine::query();
        
            if ($categoryId) {
                $machines->where('category_id', $categoryId);
            }
        
            $machines = $machines->get();
        
            return view('pages.catalogue', compact('machines'));
        }
        
    
        public function store(Request $request)
        {

            $data = $request->validate([
                'name' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'description' => 'required|string',
                'video' => 'nullable|mimes:mp4,mov,avi,webm|max:204800', // max ~200 Mo
                'images.*' => 'nullable|image|max:2048',
            ]);
        
            
            if ($request->hasFile('video') && $request->file('video')->isValid()) {
                $videoPath = $request->file('video')->store('videos', 'public');
            } else {
                $videoPath = null;
            }
            
        
            $machine = Machine::create([
                'name' => $data['name'],
                'category_id' => $data['category_id'],
                'description' => $data['description'],
                'video_path' => $videoPath,
                'active' => true
            ]);
        
            // Upload des images (jusqu’à 8)
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('machines', 'public');
                    MachineImage::create([
                        'machine_id' => $machine->id,
                        'image_path' => $path
                    ]);
                }
            }

            return redirect()->route('admin.machines.index')->with('success', 'Machine créée avec succès.');
        }
        
    
        public function update(Request $request, Machine $machine)
        {
            $data = $request->validate([
                'name' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'description' => 'required|string',
                'video' => 'nullable|mimes:mp4,mov,avi,webm|max:204800', // ~200 Mo
                'images.*' => 'nullable|image|max:2048',
            ]);
        
            // Si une nouvelle vidéo est uploadée, on l’enregistre
            if ($request->hasFile('video')) {
                $videoPath = $request->file('video')->store('videos', 'public');
                $machine->video_path = $videoPath;
            }
        
            // Mise à jour des autres champs
            $machine->update([
                'name' => $data['name'],
                'category_id' => $data['category_id'],
                'description' => $data['description'],
                'video_path' => $machine->video_path ?? null, // garde ancienne vidéo si aucune nouvelle
            ]);
        
            // Upload d’images supplémentaires
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('machines', 'public');
                    MachineImage::create([
                        'machine_id' => $machine->id,
                        'image_path' => $path
                    ]);
                }
            }
        
            return redirect()->route('admin.machines.index')->with('success', 'Machine mise à jour.');
        }
        

        public function show(Machine $machine)
        {
            $machine->load('images', 'category');
            return view('pages.detail', compact('machine'));
        }
        
        public function destroy(Machine $machine)
        {
            $machine->images()->delete(); // Supprimer les images liées
            $machine->delete();
    
            return back()->with('success', 'Machine supprimée.');
        }
    // Affiche le formulaire pour ajouter des photos
public function addPhotosForm(Machine $machine)
{
    return view('admin.machines.addphotos', compact('machine'));
}

// Enregistre les photos uploadées
public function storePhotos(Request $request, Machine $machine)
{
    $data = $request->validate([
        'images.*' => 'required|image|max:2048',
    ]);

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('machines', 'public');
            MachineImage::create([
                'machine_id' => $machine->id,
                'image_path' => $path,
            ]);
        }
    }

    return redirect()->route('admin.machines.index')->with('success', 'Images ajoutées avec succès.');
}
public function deletePhoto(MachineImage $image)
{
    if (Storage::disk('public')->exists($image->image_path)) {
        Storage::disk('public')->delete($image->image_path);
    }

    $image->delete();

    return back()->with('success', 'Photo supprimée.');
}
}
