<template>
    <aside class="w-64 bg-gray-900 text-white p-4 space-y-4">
        <h2 class="text-lg font-bold">Menú</h2>

        <nav class="space-y-2">
            <Link
                href="/"
                class="block py-2 px-3 bg-gray-800 rounded hover:bg-gray-700"
            >
                Inicio
            </Link>

            <Link
                href="/characters"
                class="block py-2 px-3 bg-gray-800 rounded hover:bg-gray-700"
            >
                Personajes
            </Link>
            <Link
                href="/locations"
                class="block py-2 px-3 bg-gray-800 rounded hover:bg-gray-700"
            >
                Ubicaciones
            </Link>
            <Link
                href="/episodes"
                class="block py-2 px-3 bg-gray-800 rounded hover:bg-gray-700"
            >
                Episodios
            </Link>
        </nav>
    </aside>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>
