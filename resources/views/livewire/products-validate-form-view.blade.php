@if($searchProducts)

<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-red-100 dark:text-red-100">
        <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            VENCIMENTO DE PRODUTOS DE HOJE
            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Nessa tabela irá mostrar todos os produtos registrados com data de vencimento para o dia atual.</p>
        </caption>
        <thead class="text-xs text-white uppercase bg-red-600 dark:text-white">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Nome do Produto
                </th>
                <th scope="col" class="py-3 px-6">
                    DATA DE VENCIMENTO
                </th>
                <th scope="col" class="py-3 px-6">
                    AÇÕES
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($searchProducts as $searchProduct)
            <tr class="bg-red-500 border-b border-red-400">
                <th scope="row" class="py-4 px-6 font-medium text-red-50 whitespace-nowrap dark:text-red-100">
                    {{ $searchProduct->Nome}}
                </th>
                <td class="py-4 px-6">
                    {{ $searchProduct->validated_date->format('d/m/y') }}
                </td>
                <td class="py-4 px-6">
                    <a href="#" class="font-medium text-white hover:underline">Excluir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<x-jet-section-border />

@else

@endif