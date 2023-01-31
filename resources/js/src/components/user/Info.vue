<template>
  <CCard>
    <CCardHeader>
      <strong>Información</strong>
    </CCardHeader>
    <CCardBody>
      <CForm>
        <CInput label="Código" :value.sync="user.id" horizontal :readonly="true" />
        <CInput
          placeholder="NOMBRE"
          label="Nombre"
          :value.sync="user.name"
          horizontal
        />
        <CInput
          label="Email"
          placeholder="Ingrese correo electrónico"
          type="email"
          :value.sync="user.email"
          horizontal
          autocomplete="email"
        />
        <CInput
          label="Teléfono"
          placeholder="Ingrese número telefónico"
          :value.sync="user.tel"
          horizontal
          autocomplete="tel"
        />
        <CInput label="Fecha de nacimiento" type="date" :value.sync="user.birthday" horizontal />
        <CSelect
          label="Posición"
          horizontal
          :value.sync="user.title_id"
          :options="titles"
          placeholder="Seleccione..."
        />
        <CSelect
          label="Departamento"
          horizontal
          :value.sync="user.department_id"
          :options="departments"
          placeholder="Seleccione..."
        />
        <CFormGroup class="form-group form-row">
          <template #label>
            <slot name="label">
              <label class="col-form-label col-sm-3">Guardar</label>
            </slot>
          </template>
          <template #input>
            <CSwitch class="mx-1" color="success" :checked.sync="user.active" />
          </template>
        </CFormGroup>
      </CForm>
    </CCardBody>
    <CCardFooter>
      <CButton type="submit" size="sm" @click="updateInfo" class="float-right" color="success">
        <CIcon name="cil-check" />Guardar
      </CButton>
    </CCardFooter>
  </CCard>
</template>

<script>
import services from "../../services/factory";

export default {
  name: "Info",
  props: {
    userId: {
      required: true,
    },
    isMe: {
      required: false,
      type: Boolean,
      default: false,
    },
  },
  beforeRouteEnter(to, from, next) {
    next((vm) => {
      vm.usersOpened = from.fullPath.includes("users");
    });
  },
  data() {
    return {
      usersOpened: null,
      user: [],
      titles: [],
      departments: [],
    };
  },
  created() {
    this.fetch();
  },
  methods: {
    async fetch() {
      const titleResponse = await services.title.all();
      this.titles = this.formatKeys(titleResponse.data);
      const departmentResponse = await services.department.all();
      this.departments = this.formatKeys(departmentResponse.data);
      const userResponse = await services.user.get(this.userId);
      this.user = userResponse.data;
    },
    async updateInfo() {
      return await (this.isMe ? services.auth : services.user)
        .update(this.user, this.userId)
        .then((response) => {
          this.$toast.success("Datos guardados");
        })
        .catch((error) => {
          this.toastHttpError(error);
        });
    },
  },
};
</script>
