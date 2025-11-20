<template>
    <AppLayout>
        <div class="mb-4">
            <Link
                href="/locations"
                class="text-blue-600 hover:text-blue-800 underline"
            >
                ← Volver a Ubicaciones
            </Link>
        </div>

        <div class="bg-white shadow rounded p-6">
            <div class="grid grid-cols-3 gap-6">
                <div class="col-span-2">
                    <h1 class="text-4xl font-bold mb-4">
                        {{ location.name }}
                    </h1>

                    <div class="space-y-3">
                        <p><strong>ID:</strong> {{ location.id }}</p>
                        <p><strong>Tipo:</strong> {{ location.type }}</p>
                        <p>
                            <strong>Dimension:</strong> {{ location.dimension }}
                        </p>
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
    location: Object,
});

const formattedDate = computed(() => {
    return new Date(props.location.created).toLocaleDateString("es-ES", {
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "2-digit",
        minute: "2-digit",
    });
});
</script>
