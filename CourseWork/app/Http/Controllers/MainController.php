<?php

namespace App\Http\Controllers;

use App\Country;
use App\Factory;
use App\Owner;
use App\Tanker;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MainController extends Controller
{
    /**
     * @return View
     */
    public function owners(): View
    {
        /** @var Collection $items */
        $items = Owner::all();
        return view('get.many', compact('items'));
    }

    /**
     * @param int $id
     * @return View
     * @throws NotFound
     */
    public function owner(int $id): View
    {
        $item = Owner::findOrFail($id);
        return view('get.one', compact('item'));
    }

    /**
     * @param int $factoryId
     * @return View
     * @throws NotFound
     */
    public function ownersByFactories(int $factoryId): View
    {
        /** @var Collection $owners */
        $items = Factory::findOrFail($factoryId)->owners;
        if ($items->isEmpty()){
            throw new NotFound();
        }
        if (count($owners) > 1) {
            return view('get.many', 'items');
        } else {
            $item = $owners;
            return view('get.one', 'item');
        }
    }

    /**
     * @param int $ownerId
     * @return View
     * Пример queryBuilder
     * @throws NotFound
     */
    public function factoriesByOwners(int $ownerId) : View
    {
        /** @var Collection $factories */
        $items = DB::table('factory')
            ->where('id', $ownerId);
        if ($factories->isEmpty()){
            throw new NotFound();
        }
        if (count($items) > 1) {
            return view('get.many', 'items');
        } else {
            $item = $items;
            return view('get.one', 'item');
        }
    }

    /**
     * @param int $factoryId
     * @return View
     * Пример нативного запроса
     * @throws NotFound
     */
    public function tankersByFactories(int $factoryId) : View
    {
        /** @var array $items */
        $items = DB::select(DB::raw('select * from tanker where factory_id = :factoryId'),
            ['factoryId' => $factoryId]
        );
        foreach ($items as &$item){

        }
        if (empty($items)){
            throw new NotFound();
        }
        if (count($items) > 1) {
            return view('get.many', 'items');
        } else {
            $item = $items[0];
            return view('get.one', 'item');
        }
    }

    /**
     * @param Request $request
     * @return string
     * @throws \Exception
     */
    public function addFactory(Request $request) :string
    {

        $factory = new Factory();

        $factory->name = $request->name;
        $factory->country_id = $request->countryId;
        try {
            $factory->save();
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            throw new \Exception('Ошибка при сохранении');
        }
        return json_encode(['success' => 'true']);
    }


}
