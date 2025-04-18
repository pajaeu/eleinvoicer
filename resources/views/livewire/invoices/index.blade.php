<div class="rounded shadow bg-white">
    <div class="p-6 md:p-12 flex items-center border-b border-slate-200">
        <h1 class="text-2xl font-semibold">Faktury</h1>
        <a href="{{ route('invoices.create') }}" wire:navigate class="ms-auto cursor-pointer py-2 px-2.5 flex gap-1 items-center rounded text-sm font-semibold text-white bg-blue-500 hover:bg-blue-600 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
            </svg>
            <span>Nová faktura</span>
        </a>
    </div>
    @forelse($invoices as $invoice)
        <div class="flex border-b border-slate-200">
            <div class="ps-6 md:ps-12 p-2 w-1/4">{{ $invoice->title }}</div>
            <div class="ms-auto p-2 text-end">{{ number_format($invoice->total, 2, ',', ' ') }} Kč</div>
            <div class="pe-6 md:pe-12 p-2">
                <div class="relative" x-data="{ show: false }" @click.outside.window.stop="show = false">
                    <button @click="show = !show" class="cursor-pointer text-slate-300 hover:text-slate-800 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                        </svg>
                    </button>
                    <div class="absolute z-10 left-0 top-full p-2 w-max bg-white rounded shadow" x-show="show">
                        <button wire:click="delete({{ $invoice->id }})" wire:confirm="Opravdu chcete smazat tuto fakturu?" class="cursor-pointer py-2 px-4 flex items-center gap-2 text-slate-500 hover:text-slate-800 rounded hover:bg-slate-100 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                            <span>Smazat</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @empty
    @endforelse

    {{ $invoices->links() }}
</div>
