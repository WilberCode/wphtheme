module.exports = {
    theme: {
        container: {
            padding: '1.5rem',
        },
        extend: {
            colors: {
                link: {
                    'default': '#3182ce',
                    'hover': '#63b3ed',
                },
                transparent: 'transparent',
                black: '#000',
                white: '#fff',
                escuela: {
                    100: '#B5BACC',
                    200: '#7D86A5',
                    300: '#58648C',
                    400: '#46537F',
                    500: '#344273',
                    600: '#2B375F',
                    700: '#222A4A',
                    800: '#181E35',
                    900: '#0F1220',
                }
            },
            fontSize: {
                xxs: '0.675rem',
            },
            lineHeight: {
                tighter: '1.125',
            }
        }
    },
    variants: {
        textColor: ['responsive', 'hover', 'focus', 'visited'],
    },
    plugins: [
        ({addUtilities}) => {
            const utils = {
                '.translate-x-half': {
                    transform: 'translateX(50%)',
                },
            };
            addUtilities(utils, ['responsive'])
        }
    ]
};
