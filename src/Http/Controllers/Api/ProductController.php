<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiHelpers;

use App\Models\V1\Product;
use Auth;
use Config;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use DataTables;
use Exception;


class ProductController extends Controller
{
    use ApiHelpers;


    public function index(Request $request)
    {
        //abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $input = $request->all();

        $query = Product::query();
        $limit = !empty($input['limit']) ? $input['limit'] : Config::get('limits.brands.on_page');

        if (!empty($input['filter'])) {
            foreach ($input['filter'] as $field => $value) {
                $query->where($field, $value);
            }
        } else {
            $query->where('id', '>', 0);
        }

        if (!empty($input["columns"]))
           foreach ($input["columns"] as $column){
               if ($column["searchable"] && empty($column["name"]))
                   $query->orWhere($column["data"], 'LIKE','%'.$input["search"]["value"].'%');
           }


        $products = Product::with('brand');

        //return ProductResource::collection($query->paginate(min($limit,Config::get('limits.brands.max')))->appends($input));
        return DataTables::of($products)->make(true);
    }

    public function store(ProductStoreRequest $request)
    {


        if ($request->fails())
            return $this->onError(400, $this->onErrorValidation($request));

        $created_brand = Product::create($request->validated());

        return (new ProductResource($created_brand))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Product $product)
    {
        //abort_if(Gate::denies('brand_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return new ProductResource($product);
    }


    public function update(ProductUpdateRequest $request, Product $product)
    {

        if ($request->fails())
            return $this->onError(400, $this->onErrorValidation($request));

        $product->update($request->validated());

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (empty($product)) {
            return $this->onError(404, 'Not Found');
        }


//        if (!$this->isAdmin(Auth::user())) {
//            return $this->onError(403, 'Forbidden');
//        }

        $product->delete();
        return $this->onSuccess('', 'Success deleted', 204);
    }
}
