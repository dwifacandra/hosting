import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/D:\Servers\dwifacandra\app\Filament\Clusters\Settings\**/*.php',
        './resources/views/filament/d:\-servers\dwifacandra\app\-filament\-clusters\-settings\**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './vendor/awcodes/filament-tiptap-editor/resources/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: '#E6130C',
                    50: '#FFF1F1',
                    100: '#FFE0DF',
                    200: '#FFC6C4',
                    300: '#FF9D9A',
                    400: '#FF6560',
                    500: '#FF362F',
                    600: '#E6130C',
                    700: '#CC0F09',
                    800: '#A9100B',
                    900: '#8B1511',
                    950: '#4C0503'
                },
                secondary: {
                    DEFAULT: '#292929',
                    50: '#F8F8F8',
                    100: '#F2F2F2',
                    200: '#DCDCDC',
                    300: '#BDBDBD',
                    400: '#989898',
                    500: '#7C7C7C',
                    600: '#656565',
                    700: '#525252',
                    800: '#464646',
                    900: '#3D3D3D',
                    950: '#292929'
                },
            },
            fontSize: {
                'xs': '0.75rem',   // 9px (0.75 * 12)
                'sm': '0.875rem',  // 10.5px (0.875 * 12)
                'base': '1rem',    // 12px
                'lg': '1.125rem',  // 13.5px (1.125 * 12)
                'xl': '1.25rem',   // 15px (1.25 * 12)
                '2xl': '1.5rem',   // 18px (1.5 * 12)
                '3xl': '1.875rem', // 22.5px (1.875 * 12)
                '4xl': '2.25rem',  // 27px (2.25 * 12)
                '5xl': '3rem',     // 36px (3 * 12)
                '6xl': '4rem',     // 48px (4 * 12)
            },
        },
    },
    plugins: [
        require('tailwind-scrollbar-hide')
    ],
}
