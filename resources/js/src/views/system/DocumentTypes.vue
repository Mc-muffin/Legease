<template>
  <CRow>
    <CCol col="md-6">
      <CFormList :service="service" :fields="fields" :title="title" />
    </CCol>
  </CRow>
</template>

<script>
import services from "../../services/factory";
import CFormList from "../../components/form/List";

export default {
  name: "DocumentTypes",
  components: {
    CFormList
  },
  data() {
    return {
      fields: [
        { key: "id", label: "Id" },
        { key: "name", label: "Nombre" },
      ],
      service: services.documentType,
      title: "Tipos de documento"
    };
  }
};
</script>
