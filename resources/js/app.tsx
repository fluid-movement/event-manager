import "./bootstrap";
import "../css/app.css"; // Tailwind
import "@radix-ui/themes/styles.css"; // Radix UI

import { createRoot } from "react-dom/client";
import { createInertiaApp } from "@inertiajs/react";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { Theme } from "@radix-ui/themes";

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.tsx`,
            import.meta.glob("./Pages/**/*.tsx")
        ),

    setup({ el, App, props }) {
        const root = createRoot(el);

        root.render(
            <Theme>
                <App {...props} />
            </Theme>
        );
    },
    progress: {
        color: "#4B5563",
    },
});
