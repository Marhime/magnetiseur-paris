import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
            publicDirectory: "public_html", // spécifiez votre répertoire public
        }),
    ],
    build: {
        outDir: "public_html/build", // spécifiez le répertoire de sortie
    },
});
