<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct() {

    }

    public function store() {
        /* VALIDACIÓN DE CAMPOS REQUERIDOS */
        $validate = \Validator::make($_POST, [
            'name' => 'required',
            'price' => 'required',
        ]);

        /* COMPROBACIÓN DEl ESTATUS DE LA VALIDACIÓN */
        if ($validate->fails()) {
            // CASO VALIDACIÓN FALLIDA => RESPUESTA FALLIDA
            $data = array(
                'code' => 404,
                'status' => 'error',
                'message' => 'Faltan enviar datos!'
            );
        } else {
            // CASO VALIDACIÓN EXITOSA => INSTANCIA DEL OBJETO PRODUCTO
            $product = new Product();
            $product->name = $_POST['name'];
            $product->price = floatval($_POST['price']);
            $product->description = ( isset($_POST['description']) ) ? $_POST['description']: '';

            // INSERT EN LA TABLA products DE LA BBDD.
            $product->save();

            // RESPUESTA EXITOSA
            $data = array(
                'code' => 200,
                'status' => 'success',
                'message' => 'Producto almacenado correctamente!',
                'product' => $product
            );
        }

        return view('new', compact('data'));
    }

    public function index() {
        // OBTENCIÓN DE LOS PRODUCTOS ORDENADOS ASCENDENTEMENTE POR NOMBRE
        $products = DB::table('products')
            ->orderBy('name', 'asc')
            ->get();

        // RESPUESTA DE CUANDO NO EXISTEN PRODUCTOS
        if (count($products) <= 0) {
            $data = array(
                'code' => 404,
                'status' => 'error',
                'message' => 'No existen productos!'
            );
        }

        // RESPUESTA EXITOSA
        $data = array(
            'code'=> 200,
            'status'=> 'success',
            'products' => $products
        );

        return view('home', compact('data'));
    }

    public function searchByRange() {
        // RESPUESTA DE ERROR
        $data = array(
            'code' => 500,
            'status' => 'error',
            'message' => 'Error: Faltan enviar los filtros!'
        );

        // COMPROBACIÓN DE LA EXISTENCIA DE FILTROS POR PRECIO MINIMO Y MAXIMO
        if (isset($_POST['min']) && !empty($_POST['min']) && isset($_POST['max']) && !empty($_POST['max'])) {
            // CONSULTA A LA BBDD DE LOS PRODUCTOS ORDENADOS ALFABETICAMENTE QUE SOLO COINCIDAN CON EL PRECIO MINIMO Y MAXIMO
            $products = DB::table('products')
            ->whereBetween('price', [$_POST['min'], $_POST['max']])
            ->orderBy('name', 'asc')
            ->get();


            // RESPUESTA DE CUANDO NO EXISTEN PRODUCTOS
            if (count($products) <= 0) {
                $data['code'] = 400;
                $data['message'] = 'No existen productos con el rango de precios: <strong>$'.$_POST['min'].' - $'.$_POST['max'].'</strong>';
            } else {
                 // RESPUESTA EXITOSA
                $data = array(
                    'code' => 200,
                    'status' => 'success',
                    'products' => $products
                );
            }
        }
        return view('home', compact('data'));
    }

    public function searchByName() {
        // RESPUESTA DE ERROR
        $data = array(
            'code' => 500,
            'status' => 'error',
            'message' => 'Error: Falto enviar el filtro nombre!'
        );

        // COMPROBACIÓN DE LA EXISTENCIA DEL FILTRO NOMBRE
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            // CONSULTA A LA BBDD DE LOS PRODUCTOS ORDENADOS ALFABETICAMENTE QUE COINCIDAN CON EL NOMBRE
            $products = DB::table('products')
            ->where('name', 'like', '%'.$name = $_POST['name'].'%')
            ->orderBy('name', 'asc')
            ->get();

            // RESPUESTA DE CUANDO NO EXISTEN PRODUCTOS
            if (count($products) <= 0) {
                $data['code'] = 400;
                $data['message'] = 'No existen productos que coincidan con: <strong>'.$_POST['name'].'</strong>!';
            } else {
                // RESPUESTA EXITOSA
                $data = array(
                    'code' => 200,
                    'status' => 'success',
                    'products' => $products
                );
            }
        }

        return view('home', compact('data'));
    }
}
