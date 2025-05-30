<template>
  <form @submit="formSubmit">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen-md-down">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="offcanvas-title">
              <template v-if="currentId != 0">
                <span>{{ $t('commission.lbl_edit_commission') }}</span>
              </template>
              <template v-else>
                <span>{{ $t('commission.lbl_add_commission') }}</span>
              </template>
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <InputField class="col-md-12" :is-required="true" :label="$t('commission.lbl_title')" placeholder="" v-model="title" :error-message="errors.title" :error-messages="errorMessages['title']"></InputField>
                <div class="form-group">
                  <label class="form-label" for="commission_type">{{ $t('commission.lbl_type') }}<span class="text-danger">*</span></label>
                  <Multiselect v-model="commission_type" :value="commission_type" v-bind="type_commission" id="commission_type" autocomplete="off"></Multiselect>
                  <span v-if="errorMessages['commission_type']">
                    <ul class="text-danger">
                      <li v-for="err in errorMessages['commission_type']" :key="err">{{ err }}</li>
                    </ul>
                  </span>
                  <span class="text-danger">{{ errors.commission_type }}</span>
                </div>

                <div class="form-group">
                  <label class="form-label" for="type">{{ $t('commission.lbl_type_commission') }}<span class="text-danger">*</span></label>
                  <Multiselect v-model="type" :value="type" v-bind="selectedType" id="type" autocomplete="off"></Multiselect>
                  <span v-if="errorMessages['type']">
                    <ul class="text-danger">
                      <li v-for="err in errorMessages['type']" :key="err">{{ err }}</li>
                    </ul>
                  </span>
                  <span class="text-danger">{{ errors.type }}</span>
                </div>
                <InputField type="text" class="col-md-12" :is-required="true" :label="$t('commission.lbl_value')" placeholder="" v-model="commission_value" :error-message="errors.commission_value" :error-messages="errorMessages['commission_value']"></InputField>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="d-grid d-md-flex gap-3 p-3">
              <button class="btn btn-primary d-block">
                <i class="fa-solid fa-floppy-disk"></i>
                Save
              </button>
              <button class="btn btn-outline-primary d-block" type="button" data-bs-dismiss="modal">
                <i class="fa-solid fa-angles-left"></i>
                Close
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>
<script setup>
import { ref, onMounted, watch } from 'vue'
import { DATATABLE_URL, EDIT_URL, STORE_URL, UPDATE_URL } from '@/vue/constants/commission'
import { useField, useForm } from 'vee-validate'
import { useRequest, useOnModalHide } from '@/helpers/hooks/useCrudOpration'
import * as yup from 'yup'
import InputField from '@/vue/components/form-elements/InputField.vue'
import FormHeader from '@/vue/components/form-elements/FormHeader.vue'
import FormFooter from '@/vue/components/form-elements/FormFooter.vue'

//useOnModalHide('exampleModal', () => setFormData(defaultData()))

onMounted(() => {
  // getServiceList()
  // getManagerList()
  setFormData(defaultData())
})

const emit = defineEmits(['onSubmit'])

// props
const props = defineProps({
  id: { type: Number, default: 0 }
})

const { getRequest, storeRequest, updateRequest } = useRequest()

const currentId = ref(props.id)
// Edit Form Or Create Form
watch(
  () => props.id,
  (value) => {
    currentId.value = value
    if (value > 0) {
      getRequest({ url: EDIT_URL, id: value }).then((res) => {
        if (res.status && res.data) {
          setFormData(res.data)
        }
      })
    } else {
      setFormData(defaultData())
    }
  }
)
const Title_data = ref({
  searchable: true,
  options: [],
  closeOnSelect: true
})

const type_commission = ref({
  searchable: true,
  options: [
    // { label: 'Weekly', value: 'Weekly'},
    { label: 'Percentage', value: 'percentage' },
    { label: 'Fixed', value: 'fixed' }
  ],
  closeOnSelect: true
})

const selectedType = ref({
  searchable: true,
  options: [
    // { label: 'Weekly', value: 'Weekly'},
    { label: 'Service', value: 'service' },
    { label: 'Product', value: 'product' }
  ],
  closeOnSelect: true
})

/*
 * Form Data & Validation & Handeling
 */
// Default FORM DATA
const defaultData = () => {
  errorMessages.value = {}
  return {
    title: '',
    commission_value: '',
    commission_type: '',
    type: ''
  }
}
//  Reset Form
const setFormData = (data) => {
  resetForm({
    values: {
      title: data.title,
      commission_value: data.commission_value,
      commission_type: data.commission_type,
      type: data.type
    }
  })
}

// Reload Datatable, SnackBar Message, Alert, Offcanvas Close
const reset_datatable_close_offcanvas = (res) => {
  if (res.status) {
    window.successSnackbar(res.message)
    // renderedDataTable.ajax.reload(null, false)
    bootstrap.Modal.getInstance('#exampleModal').hide()
    setFormData(defaultData())
  } else {
    window.errorSnackbar(res.message)
    errorMessages.value = res.all_message
  }
  emit('onSubmit')
}

const numberRegex = /^\d+$/
// Validations
const validationSchema = yup.object({
  title: yup
    .string()
    .required('Title is a required field')
    .test('is-string', 'Only strings are allowed', (value) => !numberRegex.test(value)),
  commission_value: yup
    .string()
    .required('Commission Value is a required field')
    .matches(/^(?!0\d)\d*(\.\d+)?$/, 'Only numbers greater than 0 are allowed'),
  commission_type: yup.string().required('Commission Type is a required field'),
  type: yup.string().required('Type is a required field')
})

const { handleSubmit, errors, resetForm } = useForm({
  validationSchema
})
const { value: title } = useField('title')
const { value: commission_value } = useField('commission_value')
const { value: commission_type } = useField('commission_type')
const { value: type } = useField('type')

const errorMessages = ref({})

// Form Submit
const formSubmit = handleSubmit((values) => {
  if (currentId.value > 0) {
    updateRequest({ url: UPDATE_URL, id: currentId.value, body: values }).then((res) => reset_datatable_close_offcanvas(res))
  } else {
    storeRequest({ url: STORE_URL, body: values }).then((res) => reset_datatable_close_offcanvas(res))
  }
})
</script>
