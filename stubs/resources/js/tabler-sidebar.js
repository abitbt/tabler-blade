/**
 * Tabler Sidebar Alpine.js Component
 *
 * Provides collapsible sidebar functionality with localStorage persistence.
 *
 * Usage:
 * <aside x-data="tablerSidebar(true)" :class="{ 'navbar-collapsed': collapsed }">
 *     <button @click="toggle()">Toggle</button>
 * </aside>
 */

document.addEventListener('alpine:init', () => {
    Alpine.data('tablerSidebar', (persist = true) => ({
        collapsed: false,
        persist: persist,
        storageKey: 'tabler-sidebar-collapsed',

        init() {
            // Load saved state from localStorage
            if (this.persist && localStorage.getItem(this.storageKey)) {
                this.collapsed = localStorage.getItem(this.storageKey) === 'true';
            }

            // Listen for sidebar toggle events from other components
            window.addEventListener('tabler:sidebar:toggle', () => {
                this.toggle();
            });

            // Apply initial state
            this.updateSidebarState();
        },

        toggle() {
            this.collapsed = !this.collapsed;
            this.updateSidebarState();

            // Save to localStorage
            if (this.persist) {
                localStorage.setItem(this.storageKey, this.collapsed);
            }

            // Dispatch event for other components to listen
            window.dispatchEvent(new CustomEvent('tabler:sidebar:toggled', {
                detail: { collapsed: this.collapsed }
            }));
        },

        expand() {
            if (this.collapsed) {
                this.toggle();
            }
        },

        collapse() {
            if (!this.collapsed) {
                this.toggle();
            }
        },

        updateSidebarState() {
            // Update body class for styling
            if (this.collapsed) {
                document.body.classList.add('sidebar-collapsed');
            } else {
                document.body.classList.remove('sidebar-collapsed');
            }
        }
    }));
});
