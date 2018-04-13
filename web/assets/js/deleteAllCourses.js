var deleteAllProcess = {
  confirmMessage: function() {
    deleteAllProcess.confirmMessageOptions();
    $.confirm({
      title: 'DELETE ALL !',
      content: 'sure ?',
      buttons: {
        YEP: function() {
          $.alert('CONFIRMED !');
          var myTimbal = $('#my-timbal');
          url = "deleteAll";
          deleteAllProcess.ajax(myTimbal, url);
        },
        NOPE: function() {
          $.alert('CANCELED !');
        }
      }
    });
  },
  confirmMessageOptions: function() {
    jconfirm.defaults = {
      title: 'Clear it all',
      titleClass: '',
      type: 'default',
      typeAnimated: true,
      draggable: true,
      dragWindowGap: 15,
      dragWindowBorder: true,
      animateFromElement: true,
      smoothContent: true,
      content: 'Really?',
      buttons: {},
      defaultButtons: {
        ok: {
          action: function() {}
        },
        close: {
          action: function() {}
        },
      },
      contentLoaded: function(data, status, xhr) {},
      icon: '',
      lazyOpen: false,
      bgOpacity: null,
      theme: 'light',
      animation: 'scale',
      closeAnimation: 'scale',
      animationSpeed: 400,
      animationBounce: 1,
      rtl: false,
      container: 'body',
      containerFluid: false,
      backgroundDismiss: false,
      backgroundDismissAnimation: 'shake',
      autoClose: false,
      closeIcon: null,
      closeIconClass: false,
      watchInterval: 100,
      columnClass: 'col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1',
      boxWidth: '20%',
      scrollToPreviousElement: true,
      scrollToPreviousElementAnimate: true,
      useBootstrap: false,
      offsetTop: 40,
      offsetBottom: 40,
      bootstrapClasses: {
        container: 'container',
        containerFluid: 'container-fluid',
        row: 'row',
      },
      onContentReady: function() {},
      onOpenBefore: function() {},
      onOpen: function() {},
      onClose: function() {},
      onDestroy: function() {},
      onAction: function() {}
    };
  },
  deleteAllListener: function() {
    $(document).ready(function() {
      $("#delete-all").click(function(eventObject) {
        var timeTable = $('.time-table');
        if (timeTable.length > 0) {
          deleteAllProcess.confirmMessage();
        } else {
          console.log(timeTable);
        }
      })
    })
  },
  ajax: function(myTimbal, url) {
    $.ajax({
      url: url,
      context: document.body,
      success: function() {
        myTimbal.remove();
      }
    });
  }
}

deleteAllProcess.deleteAllListener();
