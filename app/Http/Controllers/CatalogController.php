<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Watch;
use Illuminate\Support\Facades\Storage;

class CatalogController extends Controller
{
    public function createForm(){
        return view('admin.create');
    }

    public function mainAdminPage(){
        $watches = Watch::all();
        return view('admin.index',compact('watches'));
    }

    public function addWatch(Request $request, ?Watch $watch = null){

        //Validation 

        $validationRules = ['model'=>'required|string|max:255',
                            'price'=>'required|numeric|min:0',
                            'brand'=>'required|string|max:100',
                            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
                            'specs' => 'nullable|array'
                        ];

        $validated = $request->validate($validationRules) ; 

        
        $formattedSpecs = [];

        if (!empty($validated['specs'])) {
            foreach ($validated['specs'] as $spec) {
                $key = trim($spec['key']);
                $value = trim($spec['value']);
                
                // Игнорируем пустые пары, чтобы не засорять базу данных
                if ($key !== '' && $value !== '') {
                    $formattedSpecs[$key] = $value;
                }
            }
        }

        // 3. Обработка картинки (как в предыдущем шаге)
            if ($request->hasFile('image')) {
                //удаляем старую картинку
                if($watch && $watch->image && Storage::disk('public')->exists($watch->image)){
                    Storage::disk('public')->delete($watch->image);
                }
                $validated['image'] = $request->file('image')->store('watches', 'public');
            }

            // 4. Добавляем отформатированные specs обратно в массив для базы данных
            $validated['specs'] = $formattedSpecs;

            // 5. Сохраняем в базу
            if($watch){
                $watch->update($validated);    
            }else{
                Watch::create($validated);
            }

            return redirect()
            ->route('createForm') 
            ->with('success', 'Товар успешно добавлен!'); 
    }

    public function catalog(){
        $watches = Watch::all();

        return view('admin.catalog',compact('watches'));
    }

    public function destroy(Watch $watch){
        //если у товара была картинка, удаляем её с диска
        
    if ($watch->image && Storage::disk('public')->exists($watch->image)) {
        Storage::disk('public')->delete($watch->image);
    }


    // 2. Удаляем сам товар из базы данных
    $watch->delete();
    return redirect()
        ->route('mainAdminPage');
    }

    public function change(Watch $watch){
        return view('admin.create', compact('watch'));
    }

    public function changePut(Watch $watch){
        return redirect()
            ->route('catalog');
    }
}
