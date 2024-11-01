import { useState, useEffect } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';

const SettingsPage = () => {
    const [count, setCount] = useState(10);
    const [imageSource, setImageSource] = useState('https://placehold.co/600x400');
    const [message, setMessage] = useState('');

    // Charger les options enregistrées lors du chargement de la page
    useEffect(() => {
        apiFetch({ path: '/seederpress/v1/options' })
            .then((options) => {
                if (options) {
                    setCount(options.count);
                    setImageSource(options.imageSource);
                }
            });
    }, []);


    const handleSave = () => {
        setMessage('Sauvegarde en cours...');

        apiFetch({
            path: '/seederpress/v1/options',
            method: 'POST',
            data: { count, imageSource },
        })
            .then(() => {
                setMessage('Options sauvegardées avec succès.');
            })
            .catch(() => {
                setMessage('Erreur lors de la sauvegarde des options.');
            });
    };

    return (
        <div className="content-generator-settings">
            <h1>Paramètres du SeederPress</h1>
            <label>
                Nombre d'articles à générer :
                <input
                    type="number"
                    value={count}
                    min="1"
                    onChange={(e) => setCount(e.target.value)}
                />
            </label>
            <label>
                Source des images :
                <input
                    type="text"
                    value={imageSource}
                    onChange={(e) => setImageSource(e.target.value)}
                />
            </label>
            <button className="button button-primary" onClick={handleSave}>
                Sauvegarder les paramètres
            </button>
            <div>{message}</div>
        </div>
    );
};

export default SettingsPage;

// Rendu du composant dans le DOM
const domReady = require('@wordpress/dom-ready');
import { createRoot } from 'react-dom/client';

const rootElement = document.getElementById('content-generator-settings');
if (rootElement) {
    const root = createRoot(rootElement);
    root.render(
        <React.StrictMode>
            <SettingsPage />
        </React.StrictMode>
    );
}