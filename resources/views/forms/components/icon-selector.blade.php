<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div x-data="{ 
        selectedIcon: @entangle($getStatePath()),
        searchTerm: '',
        filteredIcons: @js($getIcons()),
        get filteredIcons() {
            if (!this.searchTerm) return this.filteredIcons;
            return Object.fromEntries(
                Object.entries(this.filteredIcons).filter(([key, value]) => 
                    value.toLowerCase().includes(this.searchTerm.toLowerCase()) ||
                    key.toLowerCase().includes(this.searchTerm.toLowerCase())
                )
            );
        }
    }" class="space-y-4">
        <!-- Search input -->
        <div class="relative">
            <input 
                x-model="searchTerm" 
                type="text" 
                placeholder="Rechercher une icône..." 
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            >
            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <x-heroicon-o-magnifying-glass class="w-4 h-4 text-gray-400" />
            </div>
        </div>

        <!-- Selected icon display -->
        <div x-show="selectedIcon" class="p-4 bg-gray-50 rounded-lg border">
            <div class="flex items-center space-x-3">
                <div class="flex-shrink-0">
                    <div x-show="selectedIcon" class="w-8 h-8 text-blue-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900" x-text="selectedIcon ? filteredIcons[selectedIcon] || selectedIcon : ''"></p>
                    <p class="text-xs text-gray-500" x-text="selectedIcon"></p>
                </div>
                <button 
                    @click="selectedIcon = null" 
                    class="ml-auto text-gray-400 hover:text-gray-600"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Icons grid -->
        <div class="max-h-96 overflow-y-auto border border-gray-200 rounded-lg">
            <div class="grid grid-cols-8 gap-2 p-4" x-show="Object.keys(filteredIcons).length > 0">
                <template x-for="[iconKey, iconLabel] in Object.entries(filteredIcons)" :key="iconKey">
                    <button
                        @click="selectedIcon = iconKey"
                        :class="selectedIcon === iconKey ? 'bg-blue-100 border-blue-500 text-blue-600' : 'bg-white border-gray-200 text-gray-600 hover:bg-gray-50'"
                        class="flex flex-col items-center justify-center p-3 border rounded-lg transition-colors duration-200"
                    >
                        <div class="w-6 h-6 mb-1" x-html="getIconSvg(iconKey)"></div>
                        <span class="text-xs text-center leading-tight" x-text="iconLabel"></span>
                    </button>
                </template>
            </div>
            
            <!-- No results -->
            <div x-show="Object.keys(filteredIcons).length === 0" class="p-8 text-center text-gray-500">
                <x-heroicon-o-magnifying-glass class="w-8 h-8 mx-auto mb-2 text-gray-300" />
                <p>Aucune icône trouvée</p>
            </div>
        </div>

        <!-- Hidden input for form submission -->
        <input 
            type="hidden" 
            :name="$field->getName()" 
            :value="selectedIcon"
        >
    </div>

    <script>
        function getIconSvg(iconName) {
            // Placeholder SVG for now - in a real implementation, you'd load the actual Heroicon SVGs
            return `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>`;
        }
    </script>
</x-dynamic-component>
<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }">
        <!-- Interact with the `state` property in Alpine.js -->
    </div>
</x-dynamic-component>
