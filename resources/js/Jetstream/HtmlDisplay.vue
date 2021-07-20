<template>
    <div v-html="data"></div>
</template>

<script>
    export default {
        props: ['data']
    }
</script>

<style lang="scss" scoped>
    /* Basic editor styles */
   > * + * {
            margin-top: 0.75em;
        }

        ul,
        ol {
            padding: 0 3rem;
            list-style-type: circle;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            line-height: 1.1;
        }

        code {
            background-color: rgba(#616161, 0.1);
            color: #616161;
        }

        pre {
            background: #0D0D0D;
            color: #FFF;
            font-family: 'JetBrainsMono', monospace;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;

            code {
            color: inherit;
            padding: 0;
            background: none;
            font-size: 0.8rem;
            }
        }

        img {
            max-width: 100%;
            height: auto;
        }

        blockquote {
            padding-left: 1rem;
            border-left: 2px solid rgba(#0D0D0D, 0.1);
        }

        hr {
            border: none;
            border-top: 2px solid rgba(#0D0D0D, 0.1);
            margin: 2rem 0;
        }

        .bg-custom-gray-2 {
            background: #FAFAFA;
        }

        .bubble-menu {
            display: flex;
            background-color: #0D0D0D;
            padding: 0.2rem;
            border-radius: 0.5rem;

            button {
                border: none;
                background: none;
                color: #FFF;
                font-size: 0.85rem;
                font-weight: 500;
                padding: 0 0.2rem;
                opacity: 0.6;

                &:hover,
                &.is-active {
                    opacity: 1;
                }
            }
        }

        .floating-menu {
            display: flex;
            background-color: #0D0D0D10;
            padding: 0.2rem;
            border-radius: 0.5rem;

            button {
                border: none;
                background: none;
                font-size: 0.85rem;
                font-weight: 500;
                padding: 0 0.2rem;
                opacity: 0.6;

                &:hover,
                &.is-active {
                    opacity: 1;
                }
            }
        }

        a {
            color: #4f46e5;
        }
</style>