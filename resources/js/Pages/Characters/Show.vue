<template>
    <AppLayout>
        <div class="mb-4">
            <Link
                href="/characters"
                class="text-blue-600 hover:text-blue-800 underline"
            >
                ← Volver a Personajes
            </Link>
        </div>

        <div class="bg-white shadow rounded p-6">
            <div class="grid grid-cols-3 gap-6">
                <div>
                    <img
                        :src="character.image"
                        :alt="character.name"
                        class="rounded w-full"
                    />
                </div>

                <div class="col-span-2">
                    <h1 class="text-4xl font-bold mb-4">
                        {{ character.name }}
                    </h1>

                    <div class="space-y-3">
                        <p><strong>ID:</strong> {{ character.id }}</p>
                        <p><strong>Estado:</strong> {{ character.status }}</p>
                        <p><strong>Especie:</strong> {{ character.species }}</p>
                        <p><strong>Género:</strong> {{ character.gender }}</p>
                        <p>
                            <strong>Origen:</strong> {{ character.origin.name }}
                        </p>
                        <p>
                            <strong>Ubicación:</strong>
                            {{ character.location.name }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
    character: Object,
});
</script>
