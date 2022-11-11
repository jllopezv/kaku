function sidebar() {

    const innerBreakpoint = 1024;

    return {
        open: false,
        isWideScreen: window.innerWidth > innerBreakpoint,

        initSidebar()
        {
            this.handleResize();
        },

        handleResize()
        {
            this.isWideScreen = window.innerWidth > innerBreakpoint;
            if (this.isWideScreen)
            {
                this.setSidebarClass(true);
            }
            else
            {
                this.setSidebarClass(false);
            }
        },

        handleOpen()
        {
            //if (!this.isWideScreen)
            //{
                if (this.open)
                {
                    this.setSidebarClass(false);

                }
                else
                {
                    this.setSidebarClass(true);
                }
            //}

        },

        handleAway()
        {
            if (!this.isWideScreen)
            {
                this.setSidebarClass(false);
            }

        },

        setSidebarClass(state)
        {
            this.open = state;
            if (state)
            {
                $('#sidebar').addClass('sidebar-open');
            }
            else
            {
                $('#sidebar').removeClass('sidebar-open');
            }

        }

    }
}

function sidebarGroup() {

    return {
        itemkey:    '',
        toggleSidebarGroup()
        {
            $('#sidebargroupcontent_'+this.itemkey).slideToggle('fast');
            $('#sidebargroup_'+this.itemkey).toggleClass('sidebar-group-open');
            $('#sidebargroupcaret_'+this.itemkey).toggleClass('sidebar-caret-rotate');
        },
        initSidebarGroup(key)
        {
            this.itemkey=key;
            $('#sidebargroupcontent_'+this.itemkey).hide();
        }
    }


}
