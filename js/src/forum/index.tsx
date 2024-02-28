import app from 'flarum/forum/app';
import LogoSwitch from './components/LogoSwitch';


app.initializers.add('gtdxyz/flarum-ext-logo-boost', () => {
  
  
  m.mount(document.getElementById('home-link')!, {view: () => <LogoSwitch />});
  
  document.getElementById('home-link')!.addEventListener('click', (e) => {
    if (e.ctrlKey || e.metaKey || e.button === 1) return;
    e.preventDefault();
    // app.history.home();

    
  });
  
});
