<x-layout>
    <x-slot name="title">Edit Job</x-slot>
    <div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
        <h2 class="text-4xl text-center font-bold mb-4">
            Edit Job Listing
        </h2>
        <form method="POST" action="{{ route('jobs.update', $job->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                Job Info
            </h2>

            <x-inputs.text id="title" name="title" label="Job title" placeholder="Software Engineer"
                value="{{ old('title', $job->title) }}" />

            <x-inputs.text-area id="description" name="description" label="Job Description"
                placeholder="We are looking for a software engineer to join our team."
                value="{{ old('description', $job->description) }}" />

            <x-inputs.text id="salary" name="salary" label="Annual Salary" placeholder="90000" type="number"
                value="{{ old('salary', $job->salary) }}" />

            <x-inputs.text-area id="requirements" name="requirements" label="Requirements"
                placeholder="Bachelor's degree in Computer Science"
                value="{{ old('requirements', $job->requirements) }}" />

            <x-inputs.text-area id="benefits" name="benefits" label="Benefits"
                placeholder="Health insurance, 401k, paid time off" value="{{ old('benefits', $job->benefits) }}" />

            <x-inputs.text id="tags" name="tags" label="Tags" placeholder="development,coding,java,python"
                value="{{ old('tags', $job->tags) }}" />

            <x-inputs.select value="{{ old('job_type', $job->job_type) }}" id="job_type" name="job_type"
                label="Job Type" :options="[
                    'Full-Time' => 'Full-Time',
                    'Part-Time' => 'Part-Time',
                    'Contract' => 'Contract',
                    'Temporary' => 'Temporary',
                    'Internship' => 'Internship',
                    'Volunteer' => 'Volunteer',
                    'On-Call' => 'On-Call',
                ]">
            </x-inputs.select>

            <x-inputs.select value="{{ old('remote', $job->remote) }}" id="remote" name="remote" label="Remote"
                placeholder="Remote" :options="[0 => 'No', 1 => 'Yes']" />

            <x-inputs.text id="address" name="address" label="Address" placeholder="123 Main St"
                value="{{ old('address', $job->address) }}" />

            <x-inputs.text id="city" name="city" label="City" placeholder="Albany"
                value="{{ old('city', $job->city) }}" />

            <x-inputs.text id="state" name="state" label="State" placeholder="NY"
                value="{{ old('state', $job->state) }}" />

            <x-inputs.text id="zipcode" name="zipcode" label="ZIP Code" placeholder="12201"
                value="{{ old('zipcode', $job->zipcode) }}" />

            <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                Company Info
            </h2>

            <x-inputs.text label="Company Name" id="company_name" name="company_name" placeholder="Company name"
                value="{{ old('company_name', $job->company_name) }}" />

            <x-inputs.text-area label="Company Description" id="company_description" name="company_description"
                placeholder="Company Description"
                value="{{ old('company_description', $job->company_description) }}" />

            <x-inputs.text label="Company Website" type="url" id="company_website" name="company_website"
                placeholder="Enter website" value="{{ old('company_website', $job->company_website) }}" />

            <x-inputs.text label="Contact Phone" id="contact_phone" name="contact_phone" placeholder="Enter phone"
                value="{{ old('contact_phone', $job->contact_phone) }}" />

            <x-inputs.text label="Contact Email" type="email" id="contact_email" name="contact_email"
                placeholder="Email where you want to receive applications"
                value="{{ old('contact_email', $job->contact_email) }}" />

            <x-inputs.file id="company_logo" name="company_logo" label="Company Logo" />

            <button type="submit"
                class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">
                Save
            </button>

        </form>
    </div>
</x-layout>
