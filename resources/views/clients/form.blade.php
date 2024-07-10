{{ $errors->any() ? $errors->first() : '' }}
<div class="flex flex-wrap">
    <div class="w-full md:w-1/3">
        <div class="m-2 mb-4">
            <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipo:</label>
            <select name="type" id="type" onchange="toggleFields()" class="form-select mt-1 block w-full rounded-md focus:ring-1 focus:ring-indigo-500 dark:focus:ring-indigo-300 dark:bg-gray-700 dark:text-gray-300">
                <option value="">Selecione o tipo</option>
                <option value="1" {{ (isset($client) && $client->type == 1) ? 'selected' : (old('type') == 1 ? 'selected' : '') }}>Pessoa Física</option>
                <option value="2" {{ (isset($client) && $client->type == 2) ? 'selected' : (old('type') == 2 ? 'selected' : '') }}>Pessoa Jurídica</option>
            </select>
        </div>
    </div>
</div>
<div class="flex flex-wrap">
    <div class="w-full md:w-1/3">
        <div class="m-2 mb-4 pessoaFields" {{ isset($client) ? '' : (old('type') == 1 || old('type') == 2 ? '' : 'hidden' ) }}>
            <label for="cpfCnpj" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Documento:</label>
            <input type="text" value="@if(isset($client) && $client->cpfCnpj && !old('cpfCnpj')){{ $client->cpfCnpj }}@else{{ old('cpfCnpj')}}@endif" name="cpfCnpj" id="cpfCnpj" class="form-input mt-1 block w-full rounded-md focus:ring-1 focus:ring-indigo-500 dark:focus:ring-indigo-300 dark:bg-gray-700 dark:text-gray-300">
        </div>
    </div>
    <div class="w-full md:w-2/3">
        <div class="m-2 mb-4 pessoaFisica" {{ (isset($client) && $client->type == 1) ? '' : (old('type') == 1  ? '' : 'hidden' ) }}>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome:</label>
            <input type="text" value="@if(isset($client) && $client->name && !old('name')){{ $client->name }}@else{{ old('name')}}@endif" name="name" class="form-input mt-1 block w-full rounded-md focus:ring-1 focus:ring-indigo-500 dark:focus:ring-indigo-300 dark:bg-gray-700 dark:text-gray-300">
        </div>
        <div class="m-2 mb-4 pessoaJuridica" {{ (isset($client) && $client->type == 2) ? '' : (old('type') == 2  ? '' : 'hidden' ) }}>
            <label for="razaoSocial" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Razão Social:</label>
            <input type="text" value="@if(isset($client) && $client->razaoSocial && !old('razaoSocial')){{ $client->razaoSocial }}@else{{ old('razaoSocial')}}@endif" name="razaoSocial" class="form-input mt-1 block w-full rounded-md focus:ring-1 focus:ring-indigo-500 dark:focus:ring-indigo-300 dark:bg-gray-700 dark:text-gray-300">
        </div>
    </div>
</div>
<div class="flex flex-wrap">
    <div class="w-full md:w-1/5">
        <div class="m-2 mb-4 pessoaFields" {{ isset($client) ? '' : (old('type') == 1 || old('type') == 2 ? '' : 'hidden' ) }}>
            <label for="zipcode" class="block text-sm font-medium text-gray-700 dark:text-gray-300">CEP:</label>
            <input type="text" value="@if(isset($client) && $client->zipCode && !old('zipcode')){{ $client->zipCode }}@else{{ old('zipcode')}}@endif" name="zipcode" id="cep" onchange="buscaCEP(this.value)" class="form-input mt-1 block w-full rounded-md focus:ring-1 focus:ring-indigo-500 dark:focus:ring-indigo-300 dark:bg-gray-700 dark:text-gray-300">
        </div>
    </div>
    <div class="w-full md:w-2/5">
        <div class="m-2 mb-4 pessoaFields" {{ isset($client) ? '' : (old('type') == 1 || old('type') == 2 ? '' : 'hidden' ) }}>
            <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Endereço:</label>
            <input type="text" value="@if(isset($client) && $client->address && !old('address')){{ $client->address }}@else{{ old('address')}}@endif" name="address" id="address" class="form-input mt-1 block w-full rounded-md focus:ring-1 focus:ring-indigo-500 dark:focus:ring-indigo-300 dark:bg-gray-700 dark:text-gray-300">
        </div>
    </div>
    <div class="w-full md:w-2/5">
        <div class="m-2 mb-4 pessoaFields" {{ isset($client) ? '' : (old('type') == 1 || old('type') == 2 ? '' : 'hidden' ) }}>
            <label for="neighborhood" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bairro:</label>
            <input type="text" value="@if(isset($client) && $client->neighborhood && !old('neighborhood')){{ $client->neighborhood }}@else{{ old('neighborhood')}}@endif" name="neighborhood" id="neighborhood" class="form-input mt-1 block w-full rounded-md focus:ring-1 focus:ring-indigo-500 dark:focus:ring-indigo-300 dark:bg-gray-700 dark:text-gray-300">
        </div>
    </div>
</div>
<div class="flex flex-wrap">
    <div class="w-full md:w-1/6">
        <div class="m-2 mb-4 pessoaFields" {{ isset($client) ? '' : (old('type') == 1 || old('type') == 2 ? '' : 'hidden' ) }}>
            <label for="complement" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Complemento:</label>
            <input type="text" value="@if(isset($client) && $client->complement && !old('complement')){{ $client->complement }}@else{{ old('complement')}}@endif" name="complement" id="complement" class="form-input mt-1 block w-full rounded-md focus:ring-1 focus:ring-indigo-500 dark:focus:ring-indigo-300 dark:bg-gray-700 dark:text-gray-300">
        </div>
    </div>
    <div class="w-full md:w-1/6">
        <div class="m-2 mb-4 pessoaFields" {{ isset($client) ? '' : (old('type') == 1 || old('type') == 2 ? '' : 'hidden' ) }}>
            <label for="number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Numero:</label>
            <input type="text" name="number" value="@if(isset($client) && $client->number && !old('number')){{ $client->number }}@else{{ old('number')}}@endif" id="number" class="form-input mt-1 block w-full rounded-md focus:ring-1 focus:ring-indigo-500 dark:focus:ring-indigo-300 dark:bg-gray-700 dark:text-gray-300">
        </div>
    </div>
    <div class="w-full md:w-2/6">
        <div class="m-2 mb-4 pessoaFields" {{ isset($client) ? '' : (old('type') == 1 || old('type') == 2 ? '' : 'hidden' ) }}>
            <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estado:</label>
            <select name="state_id" id="state_id" onchange="getCidades()" class="form-select mt-1 block w-full rounded-md focus:ring-1 focus:ring-indigo-500 dark:focus:ring-indigo-300 dark:bg-gray-700 dark:text-gray-300">
                <option disabled selected>Selecione o estado</option>
                @foreach ( \App\Models\Util::states() as $estado)
                <option value="{{ $estado->id }}"
                    {{ isset($client) && $client->city->state->id == $estado->id ? 'selected' : '' }}
                    {{ old('state_id') == $estado->id ? 'selected' : '' }}>
                    {{ $estado->name }} / {{ $estado->abbr }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="w-full md:w-2/6">
        <div class="m-2 mb-4 pessoaFields" {{ isset($client) ? '' : (old('type') == 1 || old('type') == 2 ? '' : 'hidden' ) }}>
            <label for="city_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cidade:</label>
            <select name="city_id" id="city_id" class="form-select mt-1 block w-full rounded-md focus:ring-1 focus:ring-indigo-500 dark:focus:ring-indigo-300 dark:bg-gray-700 dark:text-gray-300">
                <option disabled selected>Selecione a cidade</option>
                    @if(old('city_id'))
                    {{-- Caso exista um valor antigo para 'city', mostra as cidades baseadas no estado antigo --}}
                    @foreach (App\Models\Util::citiesByStateId(old('state_id')) as $cidade)
                        <option value="{{ $cidade->id }}"
                            {{ old('city_id') == $cidade->id ? 'selected' : '' }}>
                            {{ $cidade->name }}
                        </option>
                    @endforeach
                @elseif(isset($client) && $client->city)
                    {{-- Caso não exista um valor antigo para 'city', mas existe um cliente com cidade definida, mostra as cidades do estado do cliente --}}
                    @foreach (App\Models\Util::cities($client->city->state) as $cidade)
                        <option value="{{ $cidade->id }}"
                            {{ $client->city->id == $cidade->id ? 'selected' : '' }}>
                            {{ $cidade->name }}
                        </option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
</div>
<div class="flex flex-wrap">
    <div class="w-full md:w-2/4">
        <div class="m-2 mb-4 pessoaFields" {{ isset($client) ? '' : (old('type') == 1 || old('type') == 2 ? '' : 'hidden' ) }}>
            <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Telefone:</label>
            <input type="text" value="@if(isset($client) && $client->phone && !old('phone')){{ $client->phone }}@else{{ old('phone')}}@endif" name="phone" id="phone" class="form-input mt-1 block w-full rounded-md focus:ring-1 focus:ring-indigo-500 dark:focus:ring-indigo-300 dark:bg-gray-700 dark:text-gray-300">
        </div>
    </div>
    <div class="w-full md:w-2/4">
        <div class="m-2 mb-4 pessoaFields" {{ isset($client) ? '' : (old('type') == 1 || old('type') == 2 ? '' : 'hidden' ) }}>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email:</label>
            <input type="email" value="@if(isset($client) && $client->email && !old('email')){{ $client->email }}@else{{ old('email')}}@endif" name="email" id="email" class="form-input mt-1 block w-full rounded-md focus:ring-1 focus:ring-indigo-500 dark:focus:ring-indigo-300 dark:bg-gray-700 dark:text-gray-300">
        </div>
    </div>
</div>


