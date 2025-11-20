<template>
    <AppLayout>
        <div
            class="min-h-[70vh] flex items-center justify-center p-6 bg-gradient-to-br from-gray-900 to-gray-800"
        >
            <div
                class="bg-white/10 backdrop-blur-lg border border-white/20 shadow-xl rounded-2xl p-10 max-w-xl w-full text-center text-white"
            >
                <div class="flex justify-center mb-6">
                    <img
                        :src="portalImage"
                        alt="Portal Rick and Morty"
                        class="w-60 mx-auto mb-6"
                    />
                </div>

                <h1 class="text-3xl font-bold mb-4">Bienvenido 🚀</h1>

                <p class="text-gray-200 mb-6">
                    {{ message }}
                </p>

                <div class="flex justify-center gap-4">
                    <a
                        href="/characters"
                        class="px-5 py-3 rounded-xl bg-green-500 hover:bg-green-400 text-white font-semibold transition shadow hover:shadow-lg"
                    >
                        Ver personajes
                    </a>

                    <a
                        href="https://rickandmortyapi.com/documentation"
                        target="_blank"
                        class="px-5 py-3 rounded-xl bg-blue-500 hover:bg-blue-400 text-white font-semibold transition shadow hover:shadow-lg"
                    >
                        API Docs
                    </a>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import portalImage from "@/assets/images/portada.jpg";

defineProps({
    message: String,
});
</script>
