import {defineConfig} from 'vite'
// @ts-ignore
import reactRefresh from '@vitejs/plugin-react-refresh'

// https://vitejs.dev/config/
export default defineConfig({
    plugins: [reactRefresh()],
    build: {
        outDir: 'production',
    },
})
