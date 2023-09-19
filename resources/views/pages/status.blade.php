@extends('layouts.app')

@section('content')
    <div class="flex justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
        <div class="w-full">
            <div class="max-w-sm w-full mx-auto rounded-lg bg-white px-4 pt-4 pb-6 shadow-md text-center">
                Payment in process

                <div class="w-24 h-24 mx-auto">
                    <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                        <path fill="#4f46e5" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                            <animateTransform 
                                attributeName="transform" 
                                attributeType="XML" 
                                type="rotate"
                                dur="700ms" 
                                from="0 50 50"
                                to="360 50 50" 
                                repeatCount="indefinite" />
                        </path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
@endsection
