<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Models\Menu;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    //Create category
    public function create() {
        return view("admin.menu.add", [
            'title' => 'Add Category',
            'menus' => $this->menuService->getParent(),
        ]);
    }
    
    public function store(CreateFormRequest $request) {
     
        $result = $this->menuService->create($request);
        return redirect()->back();
    }

    public function index() { 
        return view("admin.menu.list", [
            'title' => 'List Category',
            'menus' => $this->menuService->getAll(),
        ]);
    }

    //Edit category

    public function show(Menu $menu) {
        return view("admin.menu.edit", [
            'title' => 'Edit Category' . $menu->name,
            'menu' => $menu,
            'menus' => $this->menuService->getParent(),

        ]);
    }

    public function update(Menu $menu, CreateFormRequest $request) {
        $this->menuService->update($request,$menu);
        return redirect('/admin/menus/list');
    }
    //Delete category
    public function destroy(Request $request) { 
        $result = $this->menuService->destroy($request);
        if ($result) {
            return response()->json([
                'message'=> 'Remove successfully',
                'error' => false,
            ]);
        }
        return response()->json([
            'message'=> 'Remove unsuccessfully',
            'error' => true,
        ]);

    }

}
