const styles: Record<string, string> = {
    default: '/style-1.css',
    dark: '/style-2.css',
    newStyle: '/style-3.css'
};
let currentStyle = 'default';
function changeStyle(newStyleName: string) {
    if (!(newStyleName in styles)) {
        console.warn(`Nieznany styl: ${newStyleName}`);
        return;
    }
    document.querySelectorAll('link[data-dynamic-style]').forEach(el => el.remove());
    const newLink = document.createElement('link');
    newLink.rel = 'stylesheet';
    newLink.href = styles[newStyleName];
    newLink.setAttribute('data-dynamic-style', 'true');
    document.head.appendChild(newLink);
    currentStyle = newStyleName;
    console.log(`Zmieniono styl na: ${newStyleName}`);
}
changeStyle('default');
const stylesContainer = document.createElement('div');
stylesContainer.id = 'styles-links';
stylesContainer.style.margin = '20px';
stylesContainer.style.padding = '10px';
stylesContainer.style.background = 'rgba(0,0,0,0.6)';
stylesContainer.style.borderRadius = '8px';
stylesContainer.style.color = 'white';
stylesContainer.style.position = 'fixed';
stylesContainer.style.top = '30px';
stylesContainer.style.fontSize = "20px";
stylesContainer.style.fontFamily = "Raleway";
stylesContainer.style.right = '20px';
stylesContainer.innerHTML = '<strong>Wybierz styl:</strong> ';
Object.keys(styles).forEach(styleName => {
    const link = document.createElement('a');
    link.href = '#';
    link.textContent = styleName.charAt(0).toUpperCase() + styleName.slice(1);
    link.style.marginRight = '15px';
    link.style.color = '#a0d0ff';
    link.style.textDecoration = 'none';
    link.style.cursor = 'pointer';
    link.addEventListener('click', (e) => {
        e.preventDefault();
        changeStyle(styleName);
        stylesContainer.querySelectorAll('a').forEach(a => {
            a.style.fontWeight = 'normal';
            a.style.textDecoration = 'none';
        });
        link.style.fontWeight = 'bold';
        link.style.textDecoration = 'underline';
    });
    stylesContainer.appendChild(link);
});
document.body.appendChild(stylesContainer);
const defaultLink = stylesContainer.querySelector('a');
if (defaultLink) {
    defaultLink.style.fontWeight = 'bold';
    defaultLink.style.textDecoration = 'underline';
}