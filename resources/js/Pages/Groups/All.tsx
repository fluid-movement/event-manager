import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import { PageProps } from "@/types/page";
import { Card, Flex, Avatar, Box, Text } from "@radix-ui/themes";

export default function All({ auth, groups }: PageProps) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Groups - All
                </h2>
            }
        >
            <Head title="Dashboard" />
        </AuthenticatedLayout>
    );
}
