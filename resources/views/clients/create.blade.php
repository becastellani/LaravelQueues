
@extends('layouts.app')
@section('page-title', 'Cadastrar Cliente')

@section('page-script')
    <script>
        $(document).ready(function(){
            $('#type').change(function(){
                var selection = $(this).val();
                var cpfCnpjField = $('[name="cpfCnpj"]');

                if(selection == "1"){ // Pessoa Física
                    cpfCnpjField.val('');
                    cpfCnpjField.mask('000.000.000-00', {reverse: false});
                } else if(selection == "2"){ // Pessoa Jurídica
                    cpfCnpjField.val('');
                    cpfCnpjField.mask('00.000.000/0000-00', {reverse: false});
                } else {
                    cpfCnpjField.val('');
                    cpfCnpjField.unmask();
                }
            });

            
        });

        function toggleFields(){
            var selection = document.getElementById('type').value;
            var allFields = document.querySelectorAll('.pessoaFields');
            var fisicaFields = document.querySelectorAll('.pessoaFisica');
            var juridicaFields = document.querySelectorAll('.pessoaJuridica');

            if(selection == "1"){
                allFields.forEach(function(field){
                    field.hidden = false;
                });
                fisicaFields.forEach(function(field){
                    field.hidden = false;
                });
                juridicaFields.forEach(function(field){
                    field.hidden = true;
                });
            }else if(selection == "2"){
                allFields.forEach(function(field){
                    field.hidden = false;
                });
                fisicaFields.forEach(function(field){
                    field.hidden = true;
                });
                juridicaFields.forEach(function(field){
                    field.hidden = false;
                });
            }else{
                allFields.forEach(function(field){
                    field.hidden = true;
                });
                fisicaFields.forEach(function(field){
                    field.hidden = true;
                });
                juridicaFields.forEach(function(field){
                    field.hidden = true;
                });
            }
            
        }

    </script>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('clients.store') }}" accept-charset="UTF-8" class="form-horizontal"
                    enctype="multipart/form-data">
                        @csrf
                        @include('clients.form', ['formMode' => 'create'])

                        <div class="bottom-0 right-0 m-4">
                            <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded">
                            Salvar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  
@endsection
    
