<x-app-layout>
    <x-slot name="header">
            {{ __('Calculadora de Dígito Verificador') }}
    </x-slot>
    <x-slot name="subtitle">
        {{ __('O que é um dígito verificador? O último dígito de um número de código de barras de varejo EAN-13 ou UPC-A é chamado de dígito verificador. O dígito verificador é calculado a partir de todos os outros números no código de barras e ajuda a verificar se o número do código de barras está correto. Basta digitar os 12 primeiros dígitos de um número EAN-13 OU os 11 primeiros dígitos de um número UPC-A nos campos abaixo e a calculadora informará automaticamente o dígito verificador.') }}
</x-slot>
    <div>
        @livewire('calculator-form-ean')
    </div>
</x-app-layout>
