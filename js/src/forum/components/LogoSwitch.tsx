
import app from 'flarum/forum/app';
import Component, { ComponentAttrs } from 'flarum/common/Component';
// import type Mithril from 'mithril';
import classList from 'flarum/common/utils/classList';
import isObject from 'flarum/common/utils/isObject';


export default class LogoSwitch extends Component {

  view() {
    const isForum = this.isForum();

    if(isForum && app.forum.attribute('gtdxyz-logo-boost-displayUrl'))
    {
      
      return (
        <>
        <img
          onmouseenter={function () {
            $(this).attr('dataSrc',$(this).attr('src'));
            $(this).attr('src',$(this).attr('dataSwitch'));
          }}
          onmouseleave={function () {
            $(this).attr('src',$(this).attr('dataSrc'));
          }}
          dataSwitch={app.forum.attribute('gtdxyz-logo-boost-switchUrl')}
          src={app.forum.attribute('gtdxyz-logo-boost-displayUrl')}
          alt={app.forum.attribute('title')} class="Header-logo"
        />
        </>
      );
    }
    
  }

  protected isForum(){
    if(isObject(app.forum)){
      // console.log(app.forum.attribute('baseOrigin'));
      return true;
    }
    return false;
  }

}
