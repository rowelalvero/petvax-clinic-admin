<template>
  <form>
    <div :class="`offcanvas offcanvas-end offcanvas-booking`" data-bs-scroll="true" tabindex="-1" id="form-offcanvas" aria-labelledby="offcanvasBookingForm">
      <template v-if="SINLGE_STEP == 'MAIN' && status == 'completed'">
        <InvoiceComponent :booking_id="id"></InvoiceComponent>
      </template>
      <template v-else-if="SINLGE_STEP == 'MAIN' && status != 'checkout'">
        <div class="offcanvas-header">
          <BookingHeader :currentId="currentId" :booking_id="id" :editTitle="editTitle" :createTitle="createTitle" :status="status" :is_paid="is_paid" @statusUpdate="updateStatus"></BookingHeader>
        </div>
        <BookingStatus v-if="id" :status="status" :booking_id="id" :status-list="statusList" :employee_id="employee_id" @statusUpdate="updateStatus"></BookingStatus>
        <div>
          <div class="d-flex text-center date-time d-none">
            <div class="col-6 py-3">
              <i>On</i> <strong v-if="start_date_time && start_date_time !== 'Invalid date'">{{ moment(start_date_time).format('D, MMM YYYY') }}</strong>
              <strong v-else> {{ moment(current_date).format('D, MMM YYYY') }}</strong>
            </div>
            <div class="col-6 py-3">
              <i>At</i> <strong v-if="start_date_time && start_date_time !== 'Invalid date'">{{ moment(start_date_time).format('HH:mm:ss') }}</strong>
              <strong v-else>{{ moment().format(' HH:mm') }}</strong>
            </div>
          </div>
        </div>
        <div class="offcanvas-body border-top">
          <div class="form-group">
            <!-- data-bs-toggle="modal" data-bs-target="#exampleModal" -->
            <div class="d-flex justify-content-between align-items-center">
              <label class="form-label d-block" v-if="!selectedCustomer">{{ $t('booking.lbl_choose_customer') }} <span class="text-danger">*</span> </label>
              <span v-if="!selectedCustomer">
                <button type="button" data-bs-toggle="offcanvas" data-bs-target="#customer-form-offcanvas" class="btn btn-sm text-primary border-0 px-0 float-end"><i class="fa-solid fa-plus"></i> {{ $t('booking.addnew') }}</button>
              </span>
            </div>
            <div class="user-block bg-white p-3 rounded" v-if="selectedCustomer">
              <div class="d-flex align-items-start gap-4 mb-2">
                <img :src="selectedCustomer.profile_image" alt="avatar" class="img-fluid avatar avatar-60 rounded-pill" />
                <div class="flex-grow-1">
                  <div class="gap-2">
                    <h5>{{ selectedCustomer.full_name }}</h5>
                    <p class="m-0">{{ $t('booking.lbl_pgroom') }} {{ moment(selectedCustomer.created_at).format('MMMM YYYY') }}</p>
                  </div>
                </div>
                <button type="button" v-if="status !== 'check_in' && !is_paid" @click="removeCustomer()" class="text-danger bg-transparent border-0"><i class="fa-regular fa-trash-can"></i></button>
              </div>
              <div class="row m-0">
                <label class="col-3 p-0"
                  ><i
                    ><span class="fst-normal">{{ $t('booking.lbl_phone') }}</span></i
                  ></label
                >
                <strong class="col p-0">{{ selectedCustomer.mobile }}</strong>
              </div>
              <div class="row mx-0 mb-3">
                <label class="col-3 p-0"
                  ><i
                    ><span class="fst-normal">{{ $t('booking.lbl_e-mail') }}</span></i
                  ></label
                >
                <strong class="col p-0">{{ selectedCustomer.email }}</strong>
              </div>
            </div>
            <Multiselect id="user_id" v-else v-model="user_id" placeholder="Select Customer" :disabled="is_paid || filterStatus(status).is_disabled" :value="user_id" v-bind="singleSelectOption" :options="customer.options" @select="customerSelect" class="form-group"></Multiselect>
            <span class="text-danger">{{ errors.user_id }}</span>
          </div>

          <div v-if="selectedCustomer">
            <div class="col-md-12 form-group">
              <div class="d-flex justify-content-between align-items-center">
                <label class="form-label d-block">{{ $t('booking.lbl_choose_pet') }} <span class="text-danger">*</span> </label>
                <button type="button" data-bs-toggle="offcanvas" data-bs-target="#PetFromOffcanvas" class="btn btn-sm text-primary px-0 float-end"><i class="fa-solid fa-plus"></i> {{ $t('booking.addpet') }}</button>
              </div>
              <Multiselect id="pet" v-model="pet" :value="pet" placeholder="Select Pet" v-bind="SingleSelectOption" :options="pet_list.options" class="form-group"></Multiselect>
              <span class="text-danger">{{ errors.pet }}</span>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label d-block" for="date">{{ $t('booking.lbl_date') }} <span class="text-danger">*</span></label>
                  <flat-pickr placeholder="Date" id="date" class="form-control" v-model="date" :value="date" :config="config"></flat-pickr>
                  <span class="text-danger">{{ errors.date }}</span>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label" for="time">{{ $t('booking.lbl_time') }} <span class="text-danger">*</span></label>
                  <flat-pickr placeholder="Time" id="time" class="form-control" v-model="time" :value="time" :config="config_time"></flat-pickr>
                  <span class="text-danger">{{ errors.time }}</span>
                </div>
              </div>
            </div>

            <!-- <div class="col-md-12 form-group">
              <label class="form-label d-block">{{ $t('booking.lbl_choose_pet') }} <span class="text-danger">*</span>
                <button type="button" data-bs-toggle="offcanvas" data-bs-target="#PetFromOffcanvas" class="btn btn-sm text-primary px-0 float-end"><i class="fa-solid fa-plus"></i> {{$t('booking.addpet')}}</button>
               </label>
              <Multiselect id="pet" v-model="pet" :value="pet" placeholder="Select Pet" v-bind="SingleSelectOption" :options="pet_list.options" class="form-group"></Multiselect>
              <span class="text-danger">{{ errors.pet }}</span>
            </div> -->

            <div class="col-md-12 form-group">
              <label class="form-label">{{ $t('booking.lbl_walker') }} <span class="text-danger">*</span> </label>
              <Multiselect id="employee_id" v-model="employee_id" :value="employee_id" @select="getDurationList" placeholder="Select walker" v-bind="SingleSelectOption" :options="walker_list.options" class="form-group"></Multiselect>
              <span class="text-danger">{{ errors.employee_id }}</span>
            </div>

            <div class="col-md-12 form-group">
              <label class="form-label">{{ $t('booking.lbl_duration') }} <span class="text-danger">*</span> </label>
              <Multiselect id="duration" v-model="duration" :value="duration" @select="checkTotalAmount" placeholder="Select duration" v-bind="SingleSelectOption" :options="duration_list.options" class="form-group"></Multiselect>
              <span class="text-danger">{{ errors.duration }}</span>
            </div>

            <div class="col-md-12 form-group">
              <label class="form-label" for="address">{{ $t('booking.lbl_drop_off_pick_off_address') }} <span class="text-danger">*</span></label>
              <textarea class="form-control" v-model="address" id="address"></textarea>
              <span v-if="errorMessages['address']">
                <ul class="text-danger">
                  <li v-for="err in errorMessages['address']" :key="err">{{ err }}</li>
                </ul>
              </span>
              <span class="text-danger">{{ errors.address }}</span>
            </div>

            <div class="form-group col-md-12">
              <label class="form-label" for="addition_information">{{ $t('booking.lbl_addition_information') }}</label>
              <textarea class="form-control" v-model="addition_information" id="addition_information"></textarea>
              <span v-if="errorMessages['addition_information']">
                <ul class="text-danger">
                  <li v-for="err in errorMessages['addition_information']" :key="err">{{ err }}</li>
                </ul>
              </span>
              <span class="text-danger">{{ errors.addition_information }}</span>
            </div>
          </div>
        </div>

        <div class="offcanvas-footer border-top">
          <div class="form-group m-0 p-3 d-flex justify-content-center bg-soft-primary rounded align-items-center">
            <label for="">
              <h6 class="mb-0 pe-2 me-2 border-end">{{ $t('booking.amount') }}</h6>
            </label>
            <span id="totalAmountSpan" class="fw-bold">{{ formatCurrencyVue(totalAmount) }}</span>
            <small class="text-body ps-1">({{ $t('booking.included') }} {{ formatCurrencyVue(totalTaxAmount) }} {{ $t('booking.tax') }})</small>
          </div>
          <div class="d-grid d-md-flex gap-3 pt-5">
            <div class="d-grid d-md-flex gap-3 p-3">
              <button class="btn btn-primary d-flex align-items-center gap-2 fw-600" id="save-button" @click="formSubmit" :disabled="totalAmount < 1">
                {{ $t('booking.btn_save') }}
                <i class="icon-disk"></i>
              </button>
              <button class="btn btn-soft-primary d-block fw-600" type="button" data-bs-dismiss="offcanvas">
                {{ $t('booking.btn_cancle') }}
                <i class="icon-Arrow---Right-2"></i>
              </button>
            </div>
          </div>
        </div>
      </template>
    </div>
  </form>

  <PetFromOffcanvas createTitle="Create Pet"></PetFromOffcanvas>
</template>
<script setup>
import { ref, computed, onMounted } from 'vue'
import FlatPickr from 'vue-flatpickr-component'
import { useBookingStore } from '../store/booking'
import { EDIT_URL, STORE_URL, UPDATE_URL } from '../constant/booking'
// Select Options List Request
import { CUSTOMER_LIST, PET_LIST, WALKER_LIST, DURATION_LIST, DURATION_PRICE, TAX_DATA } from '../constant/booking'
import { useField, useForm } from 'vee-validate'
import * as yup from 'yup'
import { useRequest, useModuleId, useOnOffcanvasHide, useOnOffcanvasShow } from '@/helpers/hooks/useCrudOpration'
// Element Component
import BookingHeader from './BookingFormElements/BookingHeader.vue'
import BookingStatus from './BookingFormElements/BookingStatus.vue'
import InvoiceComponent from './Forms/InvoiceComponent.vue'
import PetFromOffcanvas from './Forms/PetFromOffcanvas.vue'
import { useSelect } from '@/helpers/hooks/useSelect'
import moment from 'moment'

const { getRequest, storeRequest, updateRequest, listingRequest } = useRequest()

const formatCurrencyVue = (value) => {
  if (window.currencyFormat !== undefined) {
    return window.currencyFormat(value)
  }
  return value
}
// Props
const props = defineProps({
  statusList: { type: Object },
  bookingType: { type: String, default: 'GLOBAL_BOOKING' },
  createTitle: { type: String, default: '' },
  editTitle: { type: String, default: '' },
  bookingData: {
    default: () => {
      return {
        id: 0,
        employee_id: null,
        start_date_time: null
      }
    }
  }
})
const IS_SUBMITED = ref(false)
const filterStatus = (value) => {
  if (props.statusList) {
    return props.statusList[value]
  }
  return { is_disabled: false }
}

const current_date = ref(moment().format('YYYY-MM-DD'))
const config = ref({
  dateFormat: 'Y-m-d',
  static: true,
  minDate: 'today'
})

const currentId = useModuleId(() => {
  if (currentId.value > 0) {
    getRequest({ url: EDIT_URL, id: currentId.value }).then((res) => {
      if (res.data) {
        totalAmount.value = res.data.price

        setFormData(res.data)
      }
    })
  } else {
    totalAmount.value = 0
    totalTaxAmount.value = 0
    setFormData(defaultData())
  }
})

// Vee-Validation Validations
const validationSchema = yup.object({
  pet: yup.string().required('Pet is required'),
  date: yup.string().required('Date is required'),
  time: yup.string().required('Time is required'),
  employee_id: yup.string().required('Walker is required'),
  address: yup.string().required('Address is required'),
  user_id: yup.string().required('Customer is required'),
  duration: yup.string().required('Duration is required')
})

const { handleSubmit, errors, resetForm } = useForm({ validationSchema })
const { value: user_id } = useField('user_id')
const { value: pet } = useField('pet')
const { value: date } = useField('date')
const { value: time } = useField('time')
const { value: employee_id } = useField('employee_id')
const { value: status } = useField('status')
const { value: address } = useField('address')
const { value: duration } = useField('duration')
const { value: addition_information } = useField('addition_information')

status.value = 'pending'
const errorMessages = ref({})

// Default FORM DATA
const defaultData = () => {
  errorMessages.value = {}
  return {
    user_id: '',
    pet: '',
    date: '',
    start_date_time: null,
    time: '',
    employee_id: '',
    address: '',
    duration: '',
    addition_information: ''
  }
}
//  Reset Form
const setFormData = (data) => {
  resetForm({
    values: {
      user_id: data.user_id,
      pet: data.pet_id,
      date: data.date,
      start_date_time: data.start_date_time,
      time: data.time,
      employee_id: data.employee_id,
      address: data.address,
      duration: data.duration,
      addition_information: data.booking_extra_info
    }
  })
}

function convertTo24HourFormat(time) {
  const [hour, minute, period] = time.match(/(\d+):(\d+)\s?(AM|PM)/i).slice(1)
  let hour24 = parseInt(hour, 10)

  if (period.toUpperCase() === 'PM' && hour24 !== 12) {
    hour24 += 12
  } else if (period.toUpperCase() === 'AM' && hour24 === 12) {
    hour24 = 0
  }

  return `${hour24.toString().padStart(2, '0')}:${minute}`
}
const formSubmit = handleSubmit(async (values) => {
  const saveButton = document.getElementById('save-button')
  saveButton.disabled = true

  values.type = 'walking'
  values.time = convertTo24HourFormat(values.time)
  try {
    if (currentId.value > 0) {
      await updateRequest({ url: UPDATE_URL, id: currentId.value, body: values }).then((res) => reset_datatable_close_offcanvas(res))
    } else {
      await storeRequest({ url: STORE_URL, body: values }).then((res) => reset_datatable_close_offcanvas(res))
      document.getElementById('feature_image').value = ''
    }
  } catch (error) {
    console.error('Error:', error)
  } finally {
    saveButton.disabled = false
  }
})

const reset_datatable_close_offcanvas = (res) => {
  if (res.status) {
    window.successSnackbar(res.message)
    renderedDataTable.ajax.reload(null, false)
    bootstrap.Offcanvas.getInstance('#form-offcanvas').hide()
    totalAmount.value = 0
    setFormData(defaultData())
  } else {
    window.errorSnackbar(res.message)
    errorMessages.value = res.all_message
  }
}
// flatepicker
const config_time = ref({
  dateFormat: 'h:i K',
  // time_24hr: false,
  enableTime: true,
  noCalendar: true,
  defaultHour: '00', // Update default hour to 9
  defaultMinute: '30',
  static: true
})

// Select Options
const SingleSelectOption = ref({
  closeOnSelect: true,
  searchable: true,
  clearable: false
})

const pet_list = ref([])
const getPetList = (value) => {
  useSelect({ url: PET_LIST, data: { user_id: value } }, { value: 'id', label: 'name' }).then((data) => (pet_list.value = data))
}

const walker_list = ref([])
const getWalkerList = () => {
  useSelect({ url: WALKER_LIST }, { value: 'id', label: 'full_name' }).then((data) => {
    walker_list.value = data
    if (data.options.length > 0) {
      employee_id.value = data.options[0].value
    }
    const employeeId = walker_list.value.list.length ? walker_list.value.list[0].id : null
    if (employeeId) {
      getDurationList(employeeId)
    } else {
      console.error('No employee found to get booking price.')
    }
  })
}

const duration_list = ref([])
const getDurationList = (employeeId) => {
  useSelect({ url: DURATION_LIST, data: { type: 'walking', employee_id: employeeId } }, { value: 'id', label: 'duration' })
    .then((response) => {
      if (response && Array.isArray(response.list)) {
        duration_list.value = {
          list: response.list,
          options: response.options.map((item) => ({
            value: item.value,
            label: formatDuration(item.label) // Format the duration label
          }))
        }
      } else {
        console.error('Invalid duration list response:', response)
      }
    })
    .catch((error) => {
      console.error('Error fetching duration list:', error)
    })
}
const formatDuration = (duration) => {
  const [hours, minutes] = duration.split(':').map(Number)
  let formattedDuration = ''

  if (hours > 0) {
    formattedDuration += `${hours} hr${hours > 1 ? 's' : ''}`
  }

  if (minutes > 0) {
    if (formattedDuration) formattedDuration += ' '
    formattedDuration += `${minutes} min${minutes > 1 ? 's' : ''}`
  }

  return formattedDuration
}

const customer = ref({ options: [], list: [] })
useOnOffcanvasHide('form-offcanvas', () => setFormData(defaultData()))
useOnOffcanvasShow('form-offcanvas', () => {
  getCustomers()
  getWalkerList()
  getDurationList()
  gettaxData()
})
onMounted(() => {
  getCustomers()
  getWalkerList()
  getDurationList()
  gettaxData()
})

// Select Options
const singleSelectOption = ref({
  closeOnSelect: true,
  searchable: true
})

const getCustomers = (cb) =>
  useSelect({ url: CUSTOMER_LIST }, { value: 'id', label: 'full_name' }).then((data) => {
    customer.value = data
    if (typeof cb == 'function') {
      cb()
    }
  })

const tax_data = ref([])
const gettaxData = () => {
  const tax_type = 'services'
  listingRequest({ url: TAX_DATA, data: { tax_type: tax_type } }).then((res) => {
    tax_data.value = res.data
  })
}

const totalAmount = ref(0)
const totalTaxAmount = ref(0)

const taxCalculation = (amount) => {
  let tax_amount = 0
  if (tax_data.value && Array.isArray(tax_data.value)) {
    tax_data.value.forEach((item) => {
      const itemValue = Number(item.value)
      if (item.type === 'fixed') {
        tax_amount += itemValue
      } else if (item.type === 'percentage') {
        tax_amount += amount * (itemValue / 100)
      }
    })
  }
  totalTaxAmount.value = tax_amount
  const total_amount = amount + tax_amount
  return total_amount
}

const checkTotalAmount = () => {
  let duration_id = duration.value

  listingRequest({ url: DURATION_PRICE, data: { duration_id: duration_id } }).then((res) => {
    if (res.data) {
      let amount = res.data.price
      let total_amount = taxCalculation(amount)
      totalAmount.value = total_amount
    }
  })
}

const newCustomerData = ref(null)
const customerSelect = (value) => {
  getPetList(value)
  if (_.isString(value)) {
    newCustomerData.value = {
      first_name: value.split(' ')[0] || '',
      last_name: value.split(' ')[1] || ''
    }
    bootstrap.Modal.getOrCreateInstance($('#exampleModal')).show()
    user_id.value = null
  }
}

//  Customer Select & Unselect & Selected Values
const selectedCustomer = computed(() => customer.value.list.find((customer) => customer.id == user_id.value) ?? null)
const removeCustomer = () => {
  user_id.value = null
  services_id.value = []
  selectedService.value = []
}

const store = useBookingStore()
const SINLGE_STEP = computed(() => store.singleStep)

const updateStatus = (data) => {
  setFormData(data)
  emit('onSubmit')
}
</script>

<style scoped>
.offcanvas {
  box-shadow: none;
}
.service-duration {
  position: absolute;
  /* padding: 2px 8px; */
  bottom: -16px;
  border-radius: 0;
  border-bottom-left-radius: 4px;
  border-bottom-right-radius: 4px;
  right: 0;
}

.border-br-radius-0 {
  border-bottom-right-radius: 0;
}

[dir='rtl'] .border-br-radius-0 {
  border-bottom-left-radius: 0;
}
.date-time {
  border-top: 1px solid var(--bs-border-color);
}
.date-time > div:not(:first-child) {
  border-left: 1px solid var(--bs-border-color);
}
.list-group-flush > .list-group-item {
  color: var(--bs-body-color);
}
</style>
