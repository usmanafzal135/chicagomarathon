import postcss from 'rollup-plugin-postcss';
import { nodeResolve } from '@rollup/plugin-node-resolve';
import commonjs from '@rollup/plugin-commonjs';
import babel from '@rollup/plugin-babel';
import terser from '@rollup/plugin-terser';

export default {
    input: 'build.js',
    logLevel: 'info',
    output: { dir: 'dist/build/', format: 'es', sourcemap: true },
    plugins: [
        nodeResolve({
            browser: true,
            modulePaths: ['node_modules'],
        }),
        postcss(),
        commonjs(),
        babel({
            babelHelpers: 'bundled',
            exclude: 'node_modules/**',
        }),
        terser(),
    ]
};
