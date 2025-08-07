    <x-filament::widget>
        <x-filament::card>
            <h2 class="text-xl font-bold mb-4">Progress Cuti Tahunan</h2>

            <div class="space-y-3">
                @foreach ($data as $item)
                @php
                $color = 'bg-green-500';
                if ($item['persen'] >= 75) {
                $color = 'bg-red-500';
                } elseif ($item['persen'] >= 50) {
                $color = 'bg-yellow-500';
                }
                @endphp

                <div>
                    <div class="flex justify-between text-sm font-medium mb-1">
                        <span>{{ $item['nama'] }}</span>
                        <span>{{ $item['dipakai'] }} / 12 hari ({{ $item['persen'] }}%)</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div class="h-3 rounded-full {{ $color }} transition-all duration-700 ease-in-out"
                            style="width: {{ $item['persen'] }}%;">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-4">
                {{ $pegawai->links() }}
            </div>
            <div id="progress-bar"></div>

            @vite(['resources/css/app.css', 'resources/js/app.js'])
        </x-filament::card>
    </x-filament::widget>