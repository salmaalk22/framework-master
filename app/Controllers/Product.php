<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Product extends ResourceController
{
    protected $session;

    private $products = [
        [
            "id" => "623b476dc4f96", 
            "name" => "Odol",
            "category" => "utilities",
            "stock" => 200,
            "price" => 5000
        ]
    ];

    public function __construct() {
        $this->session = \Config\Services::session();
        $this->session->start();

        if(!$this->session->get('products')) {
            $this->session->set('products', $this->products);
        }
    }


    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $payload = [
            "products" => $this->session->get('products')
        ];

        echo view('product/index', $payload);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        echo view('product/new');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        
        $products = $this->session->get('products');

        $payload = [
            "id" => uniqid(),
            "name" => $this->request->getPost('name'),
            "stock" => (int) $this->request->getPost('stock'),
            "price" => (int) $this->request->getPost('price'),
            "category" => $this->request->getPost('category'),
        ];

        array_push($products, $payload);

        $this->session->set('products', $products);
        return redirect()->to('/product');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}