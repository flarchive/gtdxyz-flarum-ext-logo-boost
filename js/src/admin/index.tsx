import app from 'flarum/admin/app';
import UploadImageButton from 'flarum/admin/components/UploadImageButton';

app.initializers.add('gtdxyz-logo-boost', () => {

  
  app.extensionData
    .for('gtdxyz-logo-boost')
    .registerSetting(function(){
        return (
            <fieldset style="margin-bottom:15px;">
            <legend>{app.translator.trans('gtdxyz-logo-boost.admin.settings.logo_display_title')}</legend>
            <div className="helpText">{app.translator.trans('gtdxyz-logo-boost.admin.settings.logo_display_text')}</div>
            <UploadImageButton name="gtdxyz-logo-boost-display" />
            </fieldset>
        );
    })
    .registerSetting(function(){
      return (
          <fieldset style="margin-bottom:15px;">
          <legend>{app.translator.trans('gtdxyz-logo-boost.admin.settings.logo_switch_title')}</legend>
          <div className="helpText">{app.translator.trans('gtdxyz-logo-boost.admin.settings.logo_switch_text')}</div>
          <UploadImageButton name="gtdxyz-logo-boost-switch" />
          </fieldset>
      );
  })
});
