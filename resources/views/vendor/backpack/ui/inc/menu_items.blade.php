{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Customers" icon="la la-user" :link="backpack_url('customer')" />
<x-backpack::menu-item title="Properties" icon="la la-building" :link="backpack_url('properties')" />
<x-backpack::menu-item title="Banks" icon="la la-bank" :link="backpack_url('bank')" />
<x-backpack::menu-item title="Loan applications" icon="la la-handshake" :link="backpack_url('loan-application')" />
<x-backpack::menu-item title="Installments" icon="la la-money" :link="backpack_url('installment')" />