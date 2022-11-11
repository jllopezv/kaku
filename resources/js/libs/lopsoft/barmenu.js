function barmenu() {

    return {
        open: false,
        initBarmenu()
        {
            this.handleClose();
        },

        handleOpen()
        {
            if (this.open)
            {
                this.setBarmenuClass(false);

            }
            else
            {
                this.setBarmenuClass(true);
            }
        },

        handleClose()
        {
            this.setBarmenuClass(false);
        },

        setBarmenuClass(state)
        {
            this.open = state;
            if (state)
            {
                $('#barmenu').addClass('barmenu-open');
                $('.barmenuitem').addClass('barmenuitem-show')
                //$('#barmenu').slideDown();
            }
            else
            {
                $('#barmenu').removeClass('barmenu-open');
                $('.barmenuitem').removeClass('barmenuitem-show')
                //$('#barmenu').slideUp();
            }

        }

    }
}

function resizeVideo()
{
    let minwindowheight = 300;
    let maxwindowheight = 1600;
    let top = 90;
    let lasttop = -300;
    let stepindex = lasttop / (maxwindowheight - minwindowheight);
    let styletop = top + ( stepindex * (window.innerWidth - minwindowheight));
    document.getElementById('videocontainer').style.top = styletop+'px';
}