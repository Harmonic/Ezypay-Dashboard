/**
 * Harmonic theme settings for tailwind
 * Gives a central spot to change color schemes etc
 */
const { colors } = require('tailwindcss/defaultTheme')

module.exports = {
	theme: {
		extend: {
			colors: {
				primary: colors.indigo,
				secondary: colors.orange,
				'bg-semi-75': 'rgba(0, 0, 0, 0.75)'
			  }
		}
	}
  }