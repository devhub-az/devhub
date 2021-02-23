<div class="fixed z-10 inset-0 overflow-y-auto" x-show="activeModal == '{{ $identifier }}'" x-cloak>
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-10"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div
            class="inline-block align-bottom bg-white rounded text-left overflow-hidden shadow-xl transform transition-all my-8 sm:align-middle max-w-lg w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form action="{{ route(...$route) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div class="mt-0 ml-4 text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                {{ $title }}
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    {!! $body !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-2 bg-gray-50 px-4 py-3 ml-auto sm:px-6 w-full">
                    <div class="ml-auto">
                        <button type="button"
                                class="btn-outline inline-flex justify-center bg-white font-medium text-gray-700 hover:bg-gray-50"
                                @click.prevent="activeModal = false">
                            Отмена
                        </button>
                        <button type="submit"
                                class="btn inline-flex justify-center bg-red-600 border-none hover:bg-red-700">
                            {{ $submit ?? $title }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
