@extends('layouts.main')

@section('content')
<div>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="d-flex bd-highlight mb-3 mt-10 pt-5">
        <div class="p-2 bd-highlight">
            <button type="button" class="btn btn-secondary" onclick="showUserCreate()">Add Book</button>
        </div>
    </div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 tabel">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    #
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Kategori Buku
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Judul
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Pengarang
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Penerbit
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Quantity
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Harga
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Deskripsi Buku
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody id="mytable" class="bg-white divide-y divide-gray-200">
                <tr>
                    {{-- <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                        </div>
                        <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            Jane Cooper
                        </div>
                        <div class="text-sm text-gray-500">
                            jane.cooper@example.com
                        </div>
                        </div>
                    </div>
                    </td> --}}
                    <th scope="row" colspan="5">Loading...Dong</th>
                </tr>
    
                <!-- More people... -->
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>  
</div>
@endsection