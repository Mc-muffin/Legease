<template>
  <CRow>
    <CCol col="md-8">
      <CFormList :service="service" :fields="fields" :title="title" />
    </CCol>
  </CRow>
</template>

<script>
import services from "../../services/factory";
import CFormList from "../../components/form/List";

export default {
  name: "Signers",
  components: {
    CFormList
  },
  data() {
    return {
      fields: [
        { key: "id", label: "Id" },
        { key: "name", label: "Nombre" },
        { key: "description", label: "Descripción" }
      ],
      service: services.signer,
      title: "Firma"
    };
  }
};
</script>
