<template>
    <div class="flex min-h-screen bg-gray-100">
        <!-- Sidebar -->
        <Sidebar />

        <!-- Contenido -->
        <div class="flex-1 flex flex-col">
            <Navbar />

            <main class="p-6">
                <slot />
            </main>
        </div>
    </div>
</template>

<script setup>
import Navbar from "@/Components/Navbar.vue";
import Sidebar from "@/Components/Sidebar.vue";
</script>
