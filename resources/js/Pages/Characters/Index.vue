<template>
    <AppLayout>
        <h1 class="text-3xl font-bold mb-4">Personajes</h1>

        <!-- Filtros -->
        <div class="flex space-x-4 mb-6">
            <input
                v-model="localFilters.name"
                type="text"
                placeholder="Buscar por nombre"
                class="border p-2 rounded w-56"
            />

            <select v-model="localFilters.status" class="border p-2 rounded">
                <option value="">Estado</option>
                <option value="alive">alive</option>
                <option value="dead">dead</option>
                <option value="unknown">unknown</option>
            </select>

            <button
                @click="applyFilters"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
            >
                Buscar
            </button>
        </div>

        <!-- Tabla -->
        <div class="bg-white shadow rounded overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="p-2">ID</th>
                        <th class="p-2">Nombre</th>
                        <th class="p-2">Estado</th>
                        <th class="p-2">Especie</th>
                        <th class="p-2">Género</th>
                        <th class="p-2">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <tr
                        v-for="item in characters"
                        :key="item.id"
                        class="border-b"
                    >
                        <td class="p-2">{{ item.id }}</td>
                        <td class="p-2 flex items-center space-x-2">
                            <img
                                :src="item.image"
                                class="w-12 h-12 rounded-full"
                            />
                            <span>{{ item.name }}</span>
                        </td>
                        <td class="p-2">{{ item.status }}</td>
                        <td class="p-2">{{ item.species }}</td>
                        <td class="p-2">{{ item.gender }}</td>
                        <td class="p-2">
                            <Link
                                :href="`/characters/${item.id}`"
                                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors"
                            >
                                Ver
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="mt-4 flex justify-normal">
            <button
                @click="prevPage"
                class="px-4 py-2 bg-gray-700 text-white rounded disabled:opacity-20"
                :disabled="!hasPrev"
            >
                Anterior
            </button>

            <button
                @click="nextPage"
                class="ml-2 px-4 py-2 bg-gray-700 text-white rounded"
                :disabled="!hasNext"
            >
                Siguiente
            </button>
        </div>
    </AppLayout>
</template>

<script setup>
import { ref } from "vue";
import { router, Link } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps({
    characters: Array,
    page: Number,
    filters: Object,
    hasNext: Boolean,
    hasPrev: Boolean,
});

const localFilters = ref({
    ...props.filters,
});

// Recargar via Inertia (sin axios)
const applyFilters = () => {
    router.get("/characters", {
        page: 1,
        ...localFilters.value,
    });
};

const nextPage = () => {
    router.get("/characters", {
        page: props.page + 1,
        ...localFilters.value,
    });
};

const prevPage = () => {
    router.get("/characters", {
        page: props.page - 1,
        ...localFilters.value,
    });
};
</script>
