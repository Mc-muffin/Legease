<template>
  <CSidebar
    fixed
    :minimize="minimize"
    :show="show"
    @update:show="(value) => $store.commit('set', ['sidebarShow', value])"
  >
    <CSidebarBrand class="d-md-down-none" to="/">
      <CIcon
        class="c-sidebar-brand-full"
        src="data:image/png;base64,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"
        size="custom-size"
        :height="35"
        viewBox="0 0 556 134"
      />
      <CIcon
        class="c-sidebar-brand-minimized"
        name="logo"
        size="custom-size"
        :height="35"
        viewBox="0 0 110 134"
      />
    </CSidebarBrand>

    <CRenderFunction :key="RFKey" flat :content-to-render="$options.nav" />
    <CSidebarMinimizer
      class="d-md-down-none"
      @click.native="$store.commit('set', ['sidebarMinimize', !minimize])"
    />
  </CSidebar>
</template>

<script>
import nav from "./_nav";
import services from "../services/factory";

export default {
  name: "TheSidebar",
  nav,
  created() {
    this.init();
  },
  computed: {
    show() {
      console.log(process.env.MIX_DB_USERNAME);
      return this.$store.state.sidebarShow;
    },
    minimize() {
      return this.$store.state.sidebarMinimize;
    },
    dashboard() {
      return {
        _name: 'CSidebarNavItem',
        name: 'Página de inicio',
        to: '/dashboard',
        icon: 'cil-home',
      }
    },
  },
  methods: {
    async init() {
      const books = await this.fetchDocument();
      const system = await this.fetchSystem();
      const operating = await this.fetchOperating();
      this.$options.nav[0]._children = [this.dashboard , ...books, ...operating, ...system];
      this.RFKey += 1;
    },

    async fetchDocument() {
      return await services.book.all().then(response => {
        return [
          {
            _name: "CSidebarNavTitle",
            _children: ["Documentos"]
          },
          ...response.data.map(item => {
            return {
              _name: "CSidebarNavItem",
              name: item.name,
              to: `/books/${item.id}/documents`,
              icon: "cil-notes"
            };
          })
        ];
      });
    },

    async fetchSystem() {
      return await services.auth.namePermissions().then(permissions => {
        return this.system.filter(item => {
          return !!item.permission
            ? permissions.includes(item.permission)
            : true;
        });
      });
    },

    async fetchOperating() {
      return await services.auth.namePermissions().then(permissions => {
        return this.operating.filter(item => {
          return !!item.permission
            ? permissions.includes(item.permission)
            : true;
        });
      });
    }
  },
  data() {
    return {
      RFKey: 0, // key for rerender sidebar
      operating: [
        // {
        //   _name: "CSidebarNavTitle",
        //   _children: ["Resolución"]
        // },
        // {
        //   _name: "CSidebarNavItem",
        //   name: "Estadísticas",
        //   to: "/statistic",
        //   icon: "cil-notes",
        //   permission: process.env.MIX_PERM_USE_STATS
        // }
      ],
      system: [
        {
          _name: "CSidebarNavTitle",
          _children: ["Sistema"]
        },
        {
          _name: "CSidebarNavItem",
          name: "Usuarios",
          to: "/users",
          icon: "cil-people",
          permission: process.env.MIX_PERM_MANAGE_USERS
        },
        {
          _name: "CSidebarNavItem",
          name: "Títulos",
          to: "/titles",
          icon: "cil-contact",
          permission: process.env.MIX_PERM_MANAGE_TITLES
        },
        {
          _name: "CSidebarNavItem",
          name: "Departamentos",
          to: "/departments",
          icon: "cil-lan",
          permission: process.env.MIX_PERM_MANAGE_DEPS
        },
        {
          _name: "CSidebarNavItem",
          name: "Firmantes",
          to: "/signers",
          icon: "cil-touch-app",
          permission: process.env.MIX_PERM_MANAGESIGNS
        },
        {
          _name: "CSidebarNavItem",
          name: "Lugar de expedición",
          to: "/publishers",
          icon: "cil-institution",
          permission: process.env.MIX_PERM_MANAGE_PLACES_MADE
        },
        {
          _name: "CSidebarNavItem",
          name: "Tipos de documento",
          to: "/document-types",
          icon: "cil-text-size",
          permission: process.env.MIX_PERM_MANAGE_DOCTYPES
        },
        {
          _name: "CSidebarNavItem",
          name: "Documentos",
          to: "/books",
          icon: "cil-book",
          permission: process.env.MIX_PERM_MANAGE_DOCS
        },
        {
          _name: "CSidebarNavItem",
          name: "Roles",
          to: "/roles",
          icon: "cil-address-book",
          permission: process.env.MIX_PERM_MANAGE_ROLES
        },
        {
          _name: "CSidebarNavItem",
          name: "Permisos",
          to: "/permissions",
          icon: "cil-lock-locked",
          permission: process.env.MIX_PERM_MANAGE_PERMS
        },
        // {
        //   _name: "CSidebarNavItem",
        //   name: "Ayuda",
        //   to: "/help",
        //   icon: "cil-touch-app"
        // },
        // {
        //   _name: "CSidebarNavItem",
        //   name: "Ajustes",
        //   to: "/settings",
        //   icon: "cil-settings"
        // }
      ]
    };
  }
};
</script>
