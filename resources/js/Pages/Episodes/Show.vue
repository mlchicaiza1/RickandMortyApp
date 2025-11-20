<template>
    <AppLayout>
        <div class="mb-4">
            <Link
                href="/episodes"
                class="text-blue-600 hover:text-blue-800 underline"
            >
                ← Volver a Ubicaciones
            </Link>
        </div>

        <div class="bg-white shadow rounded p-6">
            <div class="grid grid-cols-3 gap-6">
                <div class="col-span-2">
                    <h1 class="text-4xl font-bold mb-4">
                        {{ episode.name }}
                    </h1>

                    <div class="space-y-3">
                        <p><strong>ID:</strong> {{ episode.id }}</p>
                        <p>
                            <strong>Lanzamiento:</strong> {{ episode.air_date }}
                        </p>
                        <p><strong>Episodio:</strong> {{ episode.episode }}</p>
                        <p><strong>Creado:</strong> {{ formattedDate }}</p>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import { computed } from "vue";

const props = defineProps({
    episode: Object,
});

const formattedDate = computed(() => {
    return new Date(props.episode.created).toLocaleDateString("es-ES", {
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "2-digit",
        minute: "2-digit",
    });
});
</script>
