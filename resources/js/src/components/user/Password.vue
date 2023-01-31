<template>
  <CCard>
    <CCardHeader>
      <strong>Cambiar contraseña</strong>
    </CCardHeader>
    <CCardBody>
      <CForm>
        <CInput placeholder="Ingresar contraseña" label="Contraseña actual" type="password" horizontal />
        <CInput
          placeholder="Ingrese nueva contraseña"
          label="Nueva contraseña"
          type="password"
          :value.sync="password.password"
          horizontal
        />
        <CInput
          placeholder="Confirme la contraseña"
          label="Confirmación"
          type="password"
          :value.sync="password.password_confirmation"
          horizontal
        />
      </CForm>
    </CCardBody>
    <CCardFooter>
      <CButton
        type="submit"
        @click="updatePassword"
        size="sm"
        class="float-right"
        color="success"
      >
        <CIcon name="cil-check" />Modificar
      </CButton>
    </CCardFooter>
  </CCard>
</template>

<script>
import services from "../../services/factory";

export default {
  name: "Password",
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
  data() {
    return {
      password: {
        password_confirmation: "",
        password: "",
      },
    };
  },
  methods: {
    async updatePassword() {
      return await (this.isMe ? services.auth : services.user)
        .update(this.password, this.userId)
        .then((response) => {
          this.$toast.success("Modificado con éxito");
        })
        .catch((error) => {
          this.toastHttpError(error);
        });
    },
  },
};
</script>
