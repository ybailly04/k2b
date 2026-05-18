import { defineConfig, loadEnv } from "vite";
import mkcert from "vite-plugin-mkcert";
import VitePluginBrowserSync from "vite-plugin-browser-sync";

const entries = ["./assets/js/app.js", "./assets/css/style.scss"];

export default defineConfig(({ command, mode }) => {
  const env = loadEnv(mode, process.cwd() + "/../../../"); //Root env

  return {
    base: command === "serve" ? "/" : `/${env.VITE_OUTPUT_DIR}/`,
    build: {
      manifest: true,
      outDir: env.VITE_OUTPUT_DIR,
      emptyOutDir: false,
      rollupOptions: {
        input: entries,
        output: {
          assetFileNames: `assets/[name].[ext]`,
          entryFileNames: `assets/[name].js`,
        },
      },
      watch: {
        include: "./assets/**",
      },
    },
    plugins: [
      mkcert(),
      VitePluginBrowserSync({
        buildWatch: {
          enable: true,
          bs: {
            proxy: "http://bim-timber2.test",
            files: ["./dist/assets/style.css"],
            serveStatic: ["./dist/assets"],
            injectChanges: true,
          },
        },
      }),
    ],
    css: {
      preprocessorOptions: {
        scss: {
          additionalData: `
                        @use "variables";
                        @use "mixins";
                    `,
        },
      },
    },
  };
});
