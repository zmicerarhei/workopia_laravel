<x-layout>
    <x-slot name="title">Create Job</x-slot>
    <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
        <h2 class="text-4xl text-center font-bold mb-4">
            Create Job Listing
        </h2>
        <form method="POST" action="{{ route('jobs.store') }}" enctype="multipart/form-data">
            @csrf
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                Job Info
            </h2>

            <x-inputs.text id="title" name="title" label="Job title" placeholder="Software Engineer" />

            <x-inputs.text-area id="description" name="description" label="Job Description"
                placeholder="We are looking for a software engineer to join our team." />

            <x-inputs.text id="salary" name="salary" label="Annual Salary" placeholder="90000" type="number" />

            <x-inputs.text-area id="requirements" name="requirements" label="Requirements"
                placeholder="Bachelor's degree in Computer Science" />


            <x-inputs.text-area id="benefits" name="benefits" label="Benefits"
                placeholder="Health insurance, 401k, paid time off" />

            <x-inputs.text id="tags" name="tags" label="Tags" placeholder="development,coding,java,python" />

            <x-inputs.select value="{{ old('job_type') }}" id="job_type" name="job_type" label="Job Type"
                :options="[
                    'Full-Time' => 'Full-Time',
                    'Part-Time' => 'Part-Time',
                    'Contract' => 'Contract',
                    'Temporary' => 'Temporary',
                    'Internship' => 'Internship',
                    'Volunteer' => 'Volunteer',
                    'On-Call' => 'On-Call',
                ]">
            </x-inputs.select>

            <x-inputs.select id="remote" name="remote" label="Remote" placeholder="Remote" :options="[0 => 'No', 1 => 'Yes']" />

            <x-inputs.text id="address" name="address" label="Address" placeholder="123 Main St" />

            <x-inputs.text id="city" name="city" label="City" placeholder="Albany" />

            <x-inputs.text id="state" name="state" label="State" placeholder="NY" />

            <x-inputs.text id="zipcode" name="zipcode" label="ZIP Code" placeholder="12201" />

            <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                Company Info
            </h2>

            <x-inputs.text id="company_name" name="company_name" label="Company Name" placeholder="Acme Inc" />

            <x-inputs.text-area id="company_description" name="company_description" label="Company Description"
                placeholder="Company Description" />

            <x-inputs.text id="company_website" name="company_website" label="Company Website"
                placeholder="https://www.acme.com" />

            <x-inputs.text id="contact_phone " name="contact_name" label="Contact Name" placeholder="John Doe" />

            <x-inputs.text id="contact_email" name="contact_email" label="Contact Email"
                placeholder="0j9Jw@example.com" />

            <x-inputs.file id="company_logo" name="company_logo" label="Company Logo" />

            <button type="submit"
                class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">
                Save
            </button>
        </form>
    </div>
</x-layout>
